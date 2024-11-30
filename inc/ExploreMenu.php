<div class="pt-16 explore-menu app relative" id="explore-menu" data-cursor="See Full Menu">
    <h1 class="text-3xl text-center mb-6">
        <span class="text-green-600">Explore</span> our menu
    </h1>
    <p class="text-center text-gray-600 mb-8">
        Discover a world of flavors crafted with care and passion. From fresh, locally-sourced ingredients to expertly prepared dishes, our menu offers something for everyone. Experience the perfect balance of taste, quality, and presentation as you explore our carefully curated selection of culinary delights.
    </p>
    
    <!-- Explore Items -->
    <div id="explore-grid" class="relative grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 justify-center">
        <?php 
        $counter = 0;
        foreach ($food_items as $item): 
            $hiddenClass = $counter >= 4 ? 'hidden' : ''; // Hide items beyond the first 4
        ?>
        <div class="flex flex-col items-center group <?php echo $hiddenClass; ?>">
            <div class="w-36 h-36 rounded-full border-4 border-green-600 overflow-hidden shadow-lg transform transition duration-300 group-hover:scale-110">
                <img src="<?php echo htmlspecialchars($item['image_path']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="w-full h-full object-cover">
            </div>
            <p class="mt-3 text-center text-gray-800 font-medium">
                <?php echo htmlspecialchars($item['name']); ?>
            </p>
        </div>
        <?php 
            $counter++;
        endforeach; 
        ?>
    </div>
</div>

<script>
    const exploreMenu = document.getElementById('explore-menu');
const exploreGrid = document.getElementById('explore-grid');
const cursorText = document.createElement('div');
let expanded = false;

// Create a dynamic cursor element
cursorText.id = 'custom-cursor';
cursorText.textContent = 'See Full Menu';
cursorText.style.position = 'absolute';
cursorText.style.pointerEvents = 'none';
cursorText.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
cursorText.style.color = '#fff';
cursorText.style.padding = '5px 10px';
cursorText.style.borderRadius = '5px';
cursorText.style.fontSize = '0.875rem';
cursorText.style.transition = 'transform 0.1s ease';
cursorText.style.transform = 'translate(-50%, -50%)';
cursorText.style.zIndex = '1000';
cursorText.style.display = 'none'; // Initially hidden
document.body.appendChild(cursorText);

// Track mouse movement and update cursor position
exploreMenu.addEventListener('mousemove', (e) => {
    cursorText.style.left = `${e.pageX}px`;
    cursorText.style.top = `${e.pageY}px`;
    cursorText.style.display = 'block'; // Show cursor text on hover
});

exploreMenu.addEventListener('mouseleave', () => {
    cursorText.style.display = 'none'; // Hide cursor text when mouse leaves
});

exploreGrid.addEventListener('click', () => {
    const items = document.querySelectorAll('#explore-grid > div');
    if (!expanded) {
        // Expand to show all items
        items.forEach(item => {
            item.classList.remove('hidden');
        });
        cursorText.textContent = 'Shortest Menu';
    } else {
        // Collapse to show only the first 4 items
        items.forEach((item, index) => {
            if (index >= 4) {
                item.classList.add('hidden');
            }
        });
        cursorText.textContent = 'See Full Menu';
    }
    expanded = !expanded; // Toggle the expanded state
});

</script>
