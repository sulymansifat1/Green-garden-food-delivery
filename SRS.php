<?php 
require('./admin/db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRS Page</title>
    <?php require("inc/Link.php") ?>
</head>
<body>
   <?php require("inc/Navber.php") ?>

   <div class="container mx-auto mt-10 px-4">
       <h1 class="text-2xl  text-center mb-4 text-green-600">SRS Document</h1>
       <div class="border border-gray-300 rounded-lg shadow-lg overflow-hidden ">
           <iframe 
               src="assets/Team Greengarden_Software Requirement Specification.pdf" 
               class="w-full h-[600px]" 
               frameborder="0"
           ></iframe>
       </div>
   </div>
   <?php require("inc/Banner.php") ?>
   <?php require("inc/Footer.php") ?>
</body>
</html>
