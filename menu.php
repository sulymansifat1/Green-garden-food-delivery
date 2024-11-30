<?php 
require('./admin/db.php');
session_start();

// Fetch food items
$sql = "SELECT id, name, description, price, image_path, rating FROM food_items";
$result = $conn->query($sql);

$food_items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $food_items[] = $row;
    }
}

// Check if admin is logged in
$isAdmin = isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu</title>
    <?php require("inc/Link.php"); ?>
</head>
<body>
<?php require("inc/Navber.php"); ?>
<?php require("inc/Loader.php"); ?>

<section id="food-menu" class="md:px-24 md:pb-8">
    <?php if ($isAdmin): ?>
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl">Manage <span class="text-green-600">Food Items</span></h1>
            <!-- Add New Food Item Button -->
            <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition" data-modal-target="add-food-modal" data-modal-toggle="add-food-modal">
                Add New Food Item
            </button>
        </div>
    <?php else: ?>
        <h1 class="text-3xl text-center mb-6">Our <span class="text-green-600">Delicious</span> Menu</h1>
    <?php endif; ?>

    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($food_items as $item): ?>
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                <img src="<?php echo htmlspecialchars($item['image_path'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>" class="p-4 rounded-t-lg w-full object-cover">
                <div class="px-5 pb-5">
                    <h5 class="text-lg font-medium text-gray-800"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5>
                    <p class="text-gray-600 mt-2 mb-4 text-sm"><?php echo htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                    
                    <!-- Display Rating -->
                    <div class="flex items-center mb-4">
                        <?php
                        $rating = $item['rating'];
                        $fullStars = floor($rating);
                        $halfStar = ($rating - $fullStars) >= 0.5;
                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                        ?>
                        <!-- Full Stars -->
                        <?php for ($i = 0; $i < $fullStars; $i++): ?>
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927a1 1 0 011.902 0l1.133 3.475 3.631.289a1 1 0 01.554 1.747l-2.791 2.105.831 3.498a1 1 0 01-1.527 1.094L10 13.187l-2.78 1.948a1 1 0 01-1.527-1.094l.831-3.498-2.791-2.105a1 1 0 01.554-1.747l3.631-.289L9.049 2.927z"></path>
                            </svg>
                        <?php endfor; ?>
                        <!-- Half Star -->
                        <?php if ($halfStar): ?>
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.133 3.475 3.631.289c.97.077 1.367 1.276.588 1.869l-2.791 2.105.831 3.498c.229.96-.833 1.758-1.694 1.269L10 13.187V2.927z"></path>
                            </svg>
                        <?php endif; ?>
                        <!-- Empty Stars -->
                        <?php for ($i = 0; $i < $emptyStars; $i++): ?>
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927a1 1 0 011.902 0l1.133 3.475 3.631.289a1 1 0 01.554 1.747l-2.791 2.105.831 3.498a1 1 0 01-1.527 1.094L10 13.187l-2.78 1.948a1 1 0 01-1.527-1.094l.831-3.498-2.791-2.105a1 1 0 01.554-1.747l3.631-.289L9.049 2.927z"></path>
                            </svg>
                        <?php endfor; ?>
                        <span class="ml-2 text-sm font-medium text-gray-700"><?php echo number_format($rating, 1); ?>/5</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-xl font-medium text-green-600">$<?php echo number_format($item['price'], 2); ?></span>
                        <?php if ($isAdmin): ?>
                            <div class="flex gap-2">
                                <button class="text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-lg text-sm" data-modal-target="update-food-modal-<?php echo $item['id']; ?>" data-modal-toggle="update-food-modal-<?php echo $item['id']; ?>">Update</button>
                                <form action="inc/deleteFoodHandler.php" method="POST" class="inline">
                                    <input type="hidden" name="food_id" value="<?php echo $item['id']; ?>">
                                    <button type="submit" class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-sm">Remove</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <a href="#" class="text-white bg-orange-500 hover:bg-orange-600 px-5 py-2.5 rounded-lg text-sm">Add to Cart</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Update Modal (Admin Only) -->
            <?php if ($isAdmin): ?>
            <div id="update-food-modal-<?php echo $item['id']; ?>" tabindex="-1" class="hidden fixed inset-0 z-50 overflow-y-auto bg-gray-800 bg-opacity-50 flex justify-center items-center">
                <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Update Food Item</h3>
                    <form action="inc/updateFoodHandler.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="food_id" value="<?php echo $item['id']; ?>">
                        <div class="mb-4">
                            <label for="name-<?php echo $item['id']; ?>" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name-<?php echo $item['id']; ?>" name="name" value="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2">
                        </div>
                        <div class="mb-4">
                            <label for="price-<?php echo $item['id']; ?>" class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="number" id="price-<?php echo $item['id']; ?>" name="price" value="<?php echo htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8'); ?>" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2">
                        </div>
                        <div class="mb-4">
                            <label for="description-<?php echo $item['id']; ?>" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description-<?php echo $item['id']; ?>" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2"><?php echo htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="image-<?php echo $item['id']; ?>" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" id="image-<?php echo $item['id']; ?>" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2">
                        </div>
                        <div class="mb-4">
                            <label for="rating-<?php echo $item['id']; ?>" class="block text-sm font-medium text-gray-700">Rating</label>
                            <input type="number" id="rating-<?php echo $item['id']; ?>" name="rating" step="0.1" min="0" max="5" value="<?php echo htmlspecialchars($item['rating'], ENT_QUOTES, 'UTF-8'); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2">
                        </div>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Update</button>
                        <button type="button" data-modal-hide="update-food-modal-<?php echo $item['id']; ?>" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Cancel</button>
                    </form>
                </div>
            </div>
            <?php endif; ?>

            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if ($isAdmin): ?>
<!-- Add Food Modal -->
<div id="add-food-modal" tabindex="-1" class="hidden fixed inset-0 z-50 overflow-y-auto bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Food Item</h3>
        <form action="inc/addFoodHandler.php" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" id="price" name="price" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2"></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2">
            </div>
            <div class="mb-4">
                <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                <input type="number" id="rating" name="rating" step="0.1" min="0" max="5" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2">
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Add</button>
            <button type="button" data-modal-hide="add-food-modal" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Cancel</button>
        </form>
    </div>
</div>
<?php endif; ?>

<?php require('inc/Banner.php'); ?>
<?php require('inc/Footer.php'); ?>

<!-- Include any necessary scripts for modal functionality -->
<script>
    // Simple modal toggle script
    document.querySelectorAll('[data-modal-toggle]').forEach(function(element) {
        element.addEventListener('click', function() {
            var target = this.getAttribute('data-modal-target');
            document.getElementById(target).classList.toggle('hidden');
        });
    });

    document.querySelectorAll('[data-modal-hide]').forEach(function(element) {
        element.addEventListener('click', function() {
            var target = this.getAttribute('data-modal-hide');
            document.getElementById(target).classList.add('hidden');
        });
    });
</script>
</body>
</html>
