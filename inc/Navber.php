<!-- Navbar Section -->

<nav class="md:mx-16 bg-white py-5 px-4 z-10 relative">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <img src="assets/logo.webp" alt="GreenGarden Logo" class="w-64 hidden md:block">

        <!-- Navbar Menu for Desktop -->
        <ul class="hidden md:flex space-x-8 text-gray-700 text-lg font-medium items-center">
            <li class="cursor-pointer pb-1 hover:text-green-500 transition duration-300 active-nav" id="nav-home">
                <a href="index.php">Home</a>
            </li>
            <li class="cursor-pointer pb-1 hover:text-green-500 transition duration-300" id="nav-menu">
                <a href="menu.php">Menu</a>
            </li>
            <li class="cursor-pointer pb-1 hover:text-green-500 transition duration-300" id="nav-services">
                <a href="#">Package</a>
            </li>
            <li class="cursor-pointer pb-1 hover:text-green-500 transition duration-300" id="nav-srs">
                <a href="SRS.php">SRS</a>
            </li>
        </ul>

        <!-- Navbar Right Section -->
        <div class="hidden md:flex items-center space-x-6">
            <!-- Cart Icon -->
            <div id="cart-trigger" class="relative">
                <i class="ri-shopping-cart-fill text-xl text-gray-500 hover:text-green-500 transition duration-300 cursor-pointer"></i>
                <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-green-500 rounded-full"></span>
            </div>

            <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
                <!-- Admin Dropdown -->
                <div class="relative">
                    <button id="admin-button" class="text-gray-700 border border-green-500 rounded-full px-6 py-2 hover:bg-green-500 hover:text-white transition">
                        Admin
                    </button>
                    <div id="admin-dropdown" class="absolute hidden bg-white shadow-lg rounded mt-2 w-40">
                        <a href="admin/profile.php" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                        <a href="admin/logout.php" class="block px-4 py-2 hover:bg-gray-100">Sign out</a>
                    </div>
                </div>
            <?php else: ?>
                <!-- Sign-in Button -->
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" id="sign-in-btn" class="text-gray-700 border border-green-500 rounded-full px-6 py-2 hover:bg-green-500 hover:text-white transition duration-300">
                    Sign in
                </button>
            <?php endif; ?>
        </div>
    </div>

    <!-- Mobile View -->
    <div class="flex md:hidden justify-between items-center">
        <!-- Logo -->
        <img src="assets/logo.webp" alt="GreenGarden Logo" class="w-40">

        <!-- Cart Icon -->
        <div id="cart-trigger" class="relative hidden">
            <i class="  ri-shopping-cart-fill text-xl text-gray-500 hover:text-green-500 transition duration-300 cursor-pointer"></i>
            <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-green-500 rounded-full"></span>
        </div>

        <!-- Hamburger Icon -->
        <button id="hamburger-btn" class="text-gray-700 focus:outline-none">
            <i class="ri-menu-3-line text-3xl"></i>
        </button>
    </div>

    <!-- Mobile Slider Menu -->
    <div id="mobile-menu" class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
            <h4 class="text-lg font-medium text-gray-700">Menu</h4>
            <button id="close-menu" class="text-gray-700 focus:outline-none">
                <i class="ri-close-line text-3xl"></i>
            </button>
        </div>
        <ul class="mt-4 space-y-4 px-6 text-gray-700 text-lg">
            <li class="cursor-pointer hover:text-green-500 transition duration-300"><a href="index.php">Home</a></li>
            <li class="cursor-pointer hover:text-green-500 transition duration-300"><a href="menu.php">Menu</a></li>
            <li class="cursor-pointer hover:text-green-500 transition duration-300"><a href="#">Package</a></li>
            <li class="cursor-pointer hover:text-green-500 transition duration-300"><a href="SRS.php">SRS</a></li>
        </ul>
        <div class="mt-6 px-6">
            <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
                <button class="w-full text-gray-700 border border-green-500 rounded-full px-4 py-2 hover:bg-green-500 hover:text-white transition duration-300">
                    <a href="admin/profile.php">Dashboard</a>
                </button>
                <button class="w-full text-gray-700 border border-red-500 rounded-full px-4 py-2 mt-2 hover:bg-red-500 hover:text-white transition duration-300">
                    <a href="admin/logout.php">Sign out</a>
                </button>
            <?php else: ?>
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" id="sign-in-btn" class="w-full text-gray-700 border border-green-500 rounded-full px-4 py-2 hover:bg-green-500 hover:text-white transition duration-300">
                    Sign in
                </button>
            <?php endif; ?>
        </div>
    </div>
</nav>



<script>
    // Highlight active menu item dynamically
    const currentPage = window.location.pathname.split("/").pop();
    const menuItems = document.querySelectorAll("ul li a");

    menuItems.forEach((menuItem) => {
        const href = menuItem.getAttribute("href");
        const parentLi = menuItem.parentElement;

        if (currentPage === href) {
            parentLi.classList.add("border-b-2", "border-green-500", "text-green-500");
        } else {
            parentLi.classList.remove("border-b-2", "border-green-500", "text-green-500");
        }
    });

    
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const adminButton = document.getElementById('admin-button');
    const adminDropdown = document.getElementById('admin-dropdown');

    // Toggle dropdown visibility
    adminButton.addEventListener('click', () => {
        adminDropdown.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!adminButton.contains(event.target) && !adminDropdown.contains(event.target)) {
            adminDropdown.classList.add('hidden');
        }
    });
});

</script>



<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-300">
                <h3 class="text-xl font-semibold text-gray-900">
                    Admin Login
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="admin/login.php" method="POST">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="chaity@example.com" required />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required />
                    </div>
                    <button type="submit" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Cart Modal -->
<div id="cart-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 z-50 justify-end items-start w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-sm max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t border-gray-300">
                <h2 class="text-xl font-semibold text-gray-700">Your Cart</h2>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center" data-modal-hide="cart-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex flex-col p-6 space-y-4 text-center">
                <p class="text-gray-500 text-lg font-medium">Your cart is empty</p>
                <p class="text-gray-400 text-sm">Add items to your cart to see them here.</p>
                <div class="flex justify-center mt-4">
                    <a href="menu.php" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                        Browse Menu
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const cartModal = document.getElementById('cart-modal');
    const cartTrigger = document.getElementById('cart-trigger');

    // Open modal
    cartTrigger?.addEventListener('click', () => {
        cartModal.classList.remove('hidden');
        cartModal.classList.add('flex');
    });

    // Close modal on button
    document.querySelector('[data-modal-hide="cart-modal"]').addEventListener('click', () => {
        cartModal.classList.add('hidden');
        cartModal.classList.remove('flex');
    });
</script>


<script>
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenu = document.getElementById('close-menu');

    hamburgerBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('translate-x-full');
    });

    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.add('translate-x-full');
    });
</script>
