<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
  <div class="px-3 py-2 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <!-- Left Section -->
      <div class="flex items-center">
        <!-- Back Button -->
        <a href="../index.php" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-200">
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M10 2a1 1 0 00-1.707-.707l-7 7a1 1 0 000 1.414l7 7A1 1 0 0010 16V11h7a1 1 0 000-2h-7V2z"/>
          </svg>
          <span class="ml-2 text-gray-700 font-medium">Back</span>
        </a>
        <!-- Logo -->
        <a href="dashboard.php" class="flex items-center md:pl-10">
        <img src="../assets/logo.webp" alt="GreenGarden Logo" class="w-48 ">     
      </a>
      </div>

      <!-- Right Section -->
      <div class="flex items-center">
        <!-- Log Out Button -->
        <div class="md:pr-6">
          <p class="text-sm cursor-pointer font-medium text-gray-900 bg-green-100 px-4 py-2 rounded-lg hover:bg-green-200 transition">
            <a href="logout.php">Log Out</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</nav>


<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-24 md:pt-24 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
      <ul class="space-y-2 font-medium">
         <!-- Dashboard -->
         <li>
            <a href="dashboard.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-500 hover:duration-500 hover:text-white group">
               <svg class="w-5 h-5 text-gray-500 transition duration-300 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>

         <!-- Manage Orders -->
         <li>
            <a href="manage_orders.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-500 hover:duration-500 hover:text-white group">
               <svg class="w-5 h-5 text-gray-500 transition duration-300 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2a10 10 0 100 20 10 10 0 100-20zm1 15H7v-2h6v2zm3-4H7v-2h9v2z"/>
               </svg>
               <span class="ms-3">Manage Orders</span>
            </a>
         </li>

         <!-- Order History -->
         <li>
            <a href="order_history.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-500 hover:duration-500 hover:text-white group">
               <svg class="w-5 h-5 text-gray-500 transition duration-300 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M9 11V7a1 1 0 112 0v4h4a1 1 0 010 2h-4v4a1 1 0 11-2 0v-4H5a1 1 0 010-2h4z"/>
               </svg>
               <span class="ms-3">Order History</span>
            </a>
         </li>

         <!-- Admin Info -->
         <li>
            <a href="admin_info.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-500 hover:duration-500 hover:text-white group">
               <svg class="w-5 h-5 text-gray-500 transition duration-300 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 0a5 5 0 100 10 5 5 0 100-10zM0 20a10 10 0 1120 0H0z"/>
               </svg>
               <span class="ms-3">Admin Info</span>
            </a>
         </li>

         <!-- Log Out -->
         <li>
            <a href="logout.php" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-green-500 hover:duration-500 hover:text-white group">
               <svg class="w-5 h-5 text-gray-500 transition duration-300 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M10 9H3a1 1 0 00-1 1v4a1 1 0 001 1h7v3a1 1 0 001.707.707l4.586-4.586a1 1 0 000-1.414L11.707 9.293A1 1 0 0010 10v3z"/>
               </svg>
               <span class="ms-3">Log Out</span>
            </a>
         </li>
      </ul>
   </div>
</aside>

