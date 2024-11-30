<?php
require('../admin/db.php');
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo "<script>alert('Access denied. Admins only.'); window.location.href = '../index.php';</script>";
    exit();
}

// Check if food ID is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['food_id'])) {
    $food_id = intval($_POST['food_id']);

    // Fetch the image path to delete the associated file
    $stmt = $conn->prepare("SELECT image_path FROM food_items WHERE id = ?");
    $stmt->bind_param("i", $food_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $image_path = $row['image_path'];

        // Delete the food item from the database
        $delete_stmt = $conn->prepare("DELETE FROM food_items WHERE id = ?");
        $delete_stmt->bind_param("i", $food_id);

        if ($delete_stmt->execute()) {
            // Remove the associated image file from the server
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            echo "<script>alert('Food item deleted successfully.'); window.location.href = '../menu.php';</script>";
        } else {
            echo "<script>alert('Error deleting food item. Please try again.'); window.location.href = '../menu.php';</script>";
        }
        $delete_stmt->close();
    } else {
        echo "<script>alert('Food item not found.'); window.location.href = '../menu.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = '../menu.php';</script>";
}
?>
