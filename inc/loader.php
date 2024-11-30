<script>
        window.addEventListener('load', function() {
            var loader = document.getElementById('loader');

            // Simulate a delay for demonstration purposes
            setTimeout(function() {
                loader.classList.add('hidden');
            }, 1000);
        });
    </script>

<div id="loader" class="fixed inset-0 z-50 flex items-center justify-center bg-white">
        <img src="./assets/GreenGarden.gif" alt="Loading..." class="w-96">
    </div>