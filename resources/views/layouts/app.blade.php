<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BadiliCash - @yield('title')</title>

    @vite('resources/css/app.css')

    <style>
        /* ========== SIDEBAR ========== */
        #sidebar {
            transition: all 0.3s ease;
        }

        /* Sidebar hidden (slide left) */
        #sidebar.collapsed {
            transform: translateX(-100%);
        }

        /* ========== MAIN CONTENT ========== */
        #mainContent {
            margin-left: 16rem; /* sidebar width */
            transition: margin-left 0.3s ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* When sidebar collapsed */
        #mainContent.expanded {
            margin-left: 0;
        }

        /* ========== HEADER ========== */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 4rem;
            z-index: 50;
            background: linear-gradient(to right, #047857, #0284c7);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Content area (below fixed header) */
        main {
            margin-top: 4rem;
            padding: 1.5rem;
            overflow-y: auto;
            flex: 1;
            background-color: #f3f4f6;
        }
        .breadcrumb-wrapper {
    margin-top: 4.5rem; /* adjust so it sits below fixed header */
}

        /* Toggle button (hamburger) */
        #toggleSidebarBtn {
            background: #10b981;
            color: white;
            border: none;
            border-radius: 9999px;
            padding: 0.4rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #toggleSidebarBtn:hover {
            background: #059669;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 w-64 h-screen bg-gray-800 text-white border-r border-gray-700 overflow-y-auto z-40">
        @include('components.sidebar')
    </aside>

    <!-- Main content wrapper -->
    <div id="mainContent" class="flex-1 transition-all duration-300">

        <!-- Header -->
        <header>
            <div class="flex items-center gap-2">
                <button id="toggleSidebarBtn" title="Toggle Sidebar">
                    <!-- Hamburger icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                </button>
                <h1 class="text-xl font-semibold">BadiliCash Dashboard</h1>
            </div>

            <div class="flex items-center gap-4">
                <span>Welcome, Admin</span>
                <img src="https://ui-avatars.com/api/?name=Admin" alt="User"
                    class="w-8 h-8 rounded-full border border-white">
            </div>
        </header>

        <!-- Breadcrumb -->
      <div class="breadcrumb-wrapper bg-white shadow-sm border-b border-gray-200 p-3 flex items-center justify-between">
    @include('components.breadcrumb')
</div>

        <!-- Page content -->
        <main>
            @yield('content')
        </main>
    </div>

    <script>
        // Sidebar dropdown toggle
        function toggleDropdown(id) {
            const menu = document.getElementById(id);
            if (menu) menu.classList.toggle('hidden');
        }

        // Sidebar collapse/expand
        document.getElementById('toggleSidebarBtn').addEventListener('click', () => {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });
    </script>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Page-specific scripts -->
    @yield('scripts')

</body>

</html>
