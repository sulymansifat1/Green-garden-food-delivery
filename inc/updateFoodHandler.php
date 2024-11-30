<?php
require('../admin/db.php');
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo "<script>alert('Access denied. Admins only.'); window.location.href = '../index.php';</script>";
    exit();
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $food_id = intval($_POST['food_id']);
    $name = trim($_POST['name']);
    $price = floatval($_POST['price']);
    $rating = floatval($_POST['rating']);
    $description = trim($_POST['description']);
    $new_image = $_FILES['image'];

    // Validate inputs
    if (empty($name) || $price <= 0 || $rating < 0 || $rating > 5 || empty($description)) {
        echo "<script>alert('Invalid input. Please fill in all fields correctly.'); window.location.href = '../menu.php';</script>";
        exit();
    }

    // Initialize update query and parameters
    $update_query = "UPDATE food_items SET name = ?, description = ?, price = ?, rating = ?";
    $update_params = [$name, $description, $price, $rating];
    $update_types = "ssds";

    // If a new image is uploaded, process the image
    if (isset($new_image) && $new_image['error'] === UPLOAD_ERR_OK) {
        // Validate image type
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $imageExtension = strtolower(pathinfo($new_image['name'], PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $allowedExtensions)) {
            echo "<script>alert('Invalid image format. Only JPG, PNG, and WebP are allowed.'); window.location.href = '../menu.php';</script>";
            exit();
        }

        // Validate image size (e.g., max 5MB)
        $maxFileSize = 5 * 1024 * 1024; // 5MB
        if ($new_image['size'] > $maxFileSize) {
            echo "<script>alert('File is too large. Maximum size is 5MB.'); window.location.href = '../menu.php';</script>";
            exit();
        }

        // Validate MIME type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $new_image['tmp_name']);
        finfo_close($finfo);

        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];
        if (!in_array($mimeType, $allowedMimeTypes)) {
            echo "<script>alert('Invalid image type.'); window.location.href = '../menu.php';</script>";
            exit();
        }

        // Handle image upload
        $imageName = uniqid("food_") . "." . $imageExtension;
        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
        $imagePath = '/uploads/' . $imageName; // Path to store in DB

        // Ensure uploads directory exists
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        if (!move_uploaded_file($new_image['tmp_name'], $uploadDirectory . $imageName)) {
            echo "<script>alert('Failed to upload image. Please try again.'); window.location.href = '../menu.php';</script>";
            exit();
        }

        // Fetch the old image path to delete it
        $stmt = $conn->prepare("SELECT image_path FROM food_items WHERE id = ?");
        $stmt->bind_param("i", $food_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $old_image_path = $_SERVER['DOCUMENT_ROOT'] . $row['image_path']; // Absolute path to old image

            // Delete the old image if it exists
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        $stmt->close();

        // Add image_path to update query and parameters
        $update_query .= ", image_path = ?";
        $update_params[] = $imagePath;
        $update_types .= "s";
    }

    $update_query .= " WHERE id = ?";
    $update_params[] = $food_id;
    $update_types .= "i";

    // Prepare and execute the update query
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param($update_types, ...$update_params);

    if ($stmt->execute()) {
        echo "<script>alert('Food item updated successfully!'); window.location.href = '../menu.php';</script>";
    } else {
        echo "<script>alert('Error updating food item. Please try again.'); window.location.href = '../menu.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = '../menu.php';</script>";
}
?>
