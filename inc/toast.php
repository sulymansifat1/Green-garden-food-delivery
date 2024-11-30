<!-- Toast -->
<div id="toast" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-50">
    <div class="flex flex-col md:flex-row justify-center items-center max-w-md p-6 space-x-4 shadow-lg rounded-xl bg-green-100 relative">
        
        <!-- Close Button -->
        <button 
            class="absolute top-2 right-2 text-gray-600 hover:text-gray-800"
            onclick="closeToast()"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <!-- Heading -->
        <div class="absolute top-4 text-center w-full">
            <h1 class="text-xl font-bold text-gray-800">Developers</h1>
        </div>

        <!-- Profiles -->
        <div class="flex flex-col md:flex-row justify-center items-center w-full pt-12 gap-4">
            <!-- Profile 1 -->
            <div class="flex flex-col justify-center items-center text-center">
                <img src="./assets/sifat.png" alt="Profile 1" class="w-32 h-32 rounded-full mb-2">
                <h2 class="text-base font-semibold">Md. Sulyman Islam Sifat</h2>
                <p class="text-sm text-gray-700">ID: 211-15-4004</p>
                <p class="text-sm text-gray-700">Section: 60-E</p>
                <p class="text-sm text-gray-700">sifat15-4004@diu.edu.bd</p>
            </div>
            
            <!-- Profile 2 -->
            <div class="flex flex-col justify-center items-center text-center mt-4 md:mt-0">
                <img src="./assets/chaity.png" alt="Profile 2" class="w-32 h-32 rounded-full mb-2">
                <h2 class="text-base font-semibold">Sultana Siddque Chaity</h2>
                <p class="text-sm text-gray-700">ID: 211-15-3957</p>
                <p class="text-sm text-gray-700">Section: 60-E</p>
                <p class="text-sm text-gray-700">chaity15-3957@diu.edu.bd</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Show the toast after the entire page (including images) has loaded
    window.onload = function () {
        const toast = document.getElementById('toast');
        toast.style.display = 'flex'; // Make the toast visible
    };

    // Show the toast only once per session 
    // window.onload = function () {
    //     const toast = document.getElementById('toast');
    //     const toastShown = sessionStorage.getItem('toastShown');

    //     if (!toastShown) {
    //         toast.style.display = 'flex'; // Show the toast
    //         sessionStorage.setItem('toastShown', 'true'); // Mark as shown
    //     }
    // };

    // // Close the toast
    // function closeToast() {
    //     const toast = document.getElementById('toast');
    //     toast.style.display = 'none'; // Hide the toast
    // }

    // Close the toast
    function closeToast() {
        const toast = document.getElementById('toast');
        toast.style.display = 'none'; // Hide the toast
    }
</script>



    
