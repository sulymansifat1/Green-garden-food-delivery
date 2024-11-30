<?php
require('../admin/db.php');
session_start();

// Ensure the user is an admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo "<script>alert('Unauthorized access.'); window.location.href = '../menu.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = trim($_POST['name']);
    $price = floatval($_POST['price']);
    $rating = floatval($_POST['rating']);
    $description = trim($_POST['description']);
    $image = $_FILES['image'];

    // Validate inputs
    if (empty($name) || $price <= 0 || $rating < 0 || $rating > 5 || empty($description)) {
        echo "<script>alert('Invalid input. Please fill in all fields correctly.'); window.location.href = '../menu.php';</script>";
        exit();
    }

    // Check if image was uploaded without errors
    if (isset($image) && $image['error'] === UPLOAD_ERR_OK) {
        // Validate image type
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $imageExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $allowedExtensions)) {
            echo "<script>alert('Invalid image format. Only JPG, PNG, and WebP are allowed.'); window.location.href = '../menu.php';</script>";
            exit();
        }

        // Validate image size (e.g., max 5MB)
        $maxFileSize = 5 * 1024 * 1024; // 5MB
        if ($image['size'] > $maxFileSize) {
            echo "<script>alert('File is too large. Maximum size is 5MB.'); window.location.href = '../menu.php';</script>";
            exit();
        }

        // Validate MIME type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $image['tmp_name']);
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

        if (!move_uploaded_file($image['tmp_name'], $uploadDirectory . $imageName)) {
            echo "<script>alert('Failed to upload image. Please try again.'); window.location.href = '../menu.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Please upload an image.'); window.location.href = '../menu.php';</script>";
        exit();
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO food_items (name, description, price, image_path, rating) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsd", $name, $description, $price, $imagePath, $rating);

    if ($stmt->execute()) {
        echo "<script>alert('Food item added successfully!'); window.location.href = '../menu.php';</script>";
    } else {
        echo "<script>alert('Error adding food item. Please try again.'); window.location.href = '../menu.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request method.'); window.location.href = '../menu.php';</script>";
}
?>
