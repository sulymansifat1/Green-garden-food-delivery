<?php
session_start(); // Start the session to track admin login status

// Include database connection
require('./admin/db.php');

// Fetch all food items for explore section
$food_items = [];
$sql = "SELECT name, image_path FROM food_items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $food_items[] = $row;
    }
}

// Fetch top 3 highest-rated food items for the food section
$top_rated_food_items = [];
$sql_top = "SELECT name, description, price, image_path, rating FROM food_items ORDER BY rating DESC LIMIT 3";
$result_top = $conn->query($sql_top);

if ($result_top->num_rows > 0) {
    while ($row = $result_top->fetch_assoc()) {
        $top_rated_food_items[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Garden Food Delivery</title>
</head>
<body >

<?php require('inc/Link.php') ?>
<?php require('inc/Loader.php') ?>

<header class="relative">

    <!-- Navber Section -->
    <?php require('inc/Navber.php') ?>
   
    <!-- Hero Section -->
    <?php require('inc/Hero.php') ?>
</header>

<main>

    <?php
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
        // Admin features
        echo '<h2 class="text-center text-xl font-semibold my-4">Welcome, <span class="text-green-500"> Admin!</span></h2>';
   
    } else {
        // Customer features
    ?>
    

        <!-- Explore Menu Section -->
        <?php require('inc/ExploreMenu.php') ?>

        <!-- Food Section: Top 3 Rated Items -->
        <?php require('inc/TopRated.php') ?>

    <?php } ?>

</main>

<?php require('inc/Banner.php') ?>
<?php require('inc/Footer.php') ?>
<?php require('inc/toast.php') ?>

</body>
</html>
