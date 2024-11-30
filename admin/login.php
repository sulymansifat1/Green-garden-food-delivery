<?php
session_start();
require('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password match
    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Login successful
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $email;
        header('Location: ./../index.php');
        exit();
    } else {
        // Login failed
        echo "<script>alert('Invalid email or password');</script>";
        header('Refresh: 0; URL=./../index.php');
        exit();
    }
}
?>
