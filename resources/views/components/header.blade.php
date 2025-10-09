<header class="bg-gradient-to-r from-green-500 to-blue-500 shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-white">BadiliCash Dashboard</h1>
    
    <!-- Profile Dropdown -->
    <div class="relative inline-block text-left">
        <button id="profileButton" type="button" class="inline-flex items-center focus:outline-none" aria-expanded="true" aria-haspopup="true">
            <!-- Profile Icon -->
            <svg class="w-8 h-8 text-white rounded-full bg-green-500 p-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
            </svg>
            <!-- User Name -->
            <span class="ml-2 text-white font-medium">{{ Auth::user()->name }}</span>
            <!-- Dropdown Arrow -->
            <svg class="ml-1 w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
            <a href="" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-700">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-700">Logout</button>
            </form>
        </div>
    </div>
</header>

<script>
    // Toggle dropdown menu
    const profileButton = document.getElementById('profileButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    profileButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!profileButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>
