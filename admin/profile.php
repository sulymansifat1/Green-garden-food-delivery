<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <?php require('../inc/Link.php'); ?>
</head>
<body>
<?php require('head.php') ?>

<div class="p-4 pt-24 sm:ml-64">
<h2 class="mb-4 text-2xl font-semibold leading">Dashboard</h2>

   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg  mt-14">

      <div class="grid grid-cols-3 gap-4 mb-4">
      <div class="flex items-center justify-center h-24 rounded bg-blue-100">
                <p class="text-2xl text-blue-500" id="busCount">0</p>
                <p class="text-sm text-blue-500">Total Foods</p>
            </div>


         <div class="flex items-center justify-center h-24 rounded bg-yellow-100">
                <p class="text-2xl text-yellow-500" id="userCount">0</p>
                <p class="text-sm text-yellow-500">Total Users</p>
            </div>
         <div class="flex items-center justify-center h-24 rounded bg-green-100">
                <p class="text-2xl text-green-500" id="ticketPercentage">0%</p>
                <p class="text-sm text-green-500">Ticket Percentage</p>
            </div>
         </div>

      
</div>
</body>
</html>