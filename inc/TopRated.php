<section class="md:px-48 pt-16" id="food-menu">
    <h1 class="text-3xl text-center mb-6">Top <span class="text-green-600">Rated</span> Items</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($top_rated_food_items as $item): ?>
        <div class="bg-white border rounded-lg shadow hover:shadow-lg transition-shadow">
            <a href="#">
                <img src="<?php echo htmlspecialchars($item['image_path']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="p-4 rounded-t-lg w-full object-cover">
            </a>
            <div class="p-4">
                <h5 class="text-lg font-medium text-gray-800 hover:text-green-600 transition"><?php echo htmlspecialchars($item['name']); ?></h5>
                <p class="text-gray-600 mt-2 text-sm"><?php echo htmlspecialchars($item['description']); ?></p>
                
                <!-- Ratings -->
                <div class="flex items-center mt-2">
                    <?php 
                    $fullStars = floor($item['rating']);
                    $halfStar = ($item['rating'] - $fullStars) >= 0.5 ? 1 : 0;
                    $emptyStars = 5 - $fullStars - $halfStar;
                    ?>
                    
                    <!-- Full Stars -->
                    <?php for ($i = 0; $i < $fullStars; $i++): ?>
                    <svg class="w-4 h-4 text-yellow-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <?php endfor; ?>

                    <!-- Half Star -->
                    <?php if ($halfStar): ?>
                    <svg class="w-4 h-4 text-yellow-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M11 0c-.31 0-.62.177-.755.5l-2.5 5.177-5.735.833a.75.75 0 0 0-.416 1.281l4.15 4.044-.98 5.71a.75.75 0 0 0 1.088.79L11 15.347l5.143 2.702a.75.75 0 0 0 1.088-.79l-.98-5.71 4.15-4.044a.75.75 0 0 0-.416-1.281l-5.735-.833-2.5-5.177A.75.75 0 0 0 11 0Zm0 2.06 1.926 3.993a.75.75 0 0 0 .564.41l4.408.641-3.19 3.109a.75.75 0 0 0-.216.663l.753 4.387L11 12.73a.75.75 0 0 0-.698 0L7.755 14.864l.753-4.387a.75.75 0 0 0-.216-.663l-3.19-3.109 4.408-.641a.75.75 0 0 0 .564-.41L11 2.06Z"/>
                    </svg>
                    <?php endif; ?>

                    <!-- Empty Stars -->
                    <?php for ($i = 0; $i < $emptyStars; $i++): ?>
                    <svg class="w-4 h-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <?php endfor; ?>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <span class="text-xl font-medium text-green-600">$<?php echo number_format($item['price'], 2); ?></span>
                    <a href="#" class="text-white bg-orange-500 hover:bg-orange-600 rounded-lg px-4 py-2 text-sm">Add to Cart</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-8">
        <a href="menu.php" class="bg-gray-200 text-black px-6 py-2 rounded-lg hover:bg-green-600 hover:text-white transition">See Full Menu</a>
    </div>
</section>
