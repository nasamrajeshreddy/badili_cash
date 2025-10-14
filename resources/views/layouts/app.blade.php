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
      margin-left: 16rem;
      transition: margin-left 0.3s ease;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

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

    /* Content below header */
    main {
      margin-top: 4rem;
      padding: 1.5rem;
      overflow-y: auto;
      flex: 1;
      background-color: #f3f4f6;
    }

    .breadcrumb-wrapper {
      margin-top: 4.5rem;
    }

    /* Sidebar toggle button */
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

    /* Dropdown animation */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-6px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .dropdown-appear {
      animation: fadeIn 0.15s ease-out;
    }
  </style>
</head>

<body class="bg-gray-100 font-sans">

  <!-- Sidebar -->
  <aside id="sidebar"
    class="fixed top-0 left-0 w-64 h-screen bg-gray-800 text-white border-r border-gray-700 overflow-y-auto z-40">
    @include('components.sidebar')
  </aside>

  <!-- Main Content -->
  <div id="mainContent" class="flex-1 transition-all duration-300">

    <!-- Header -->
    <header>
      <div class="flex items-center gap-2">
        <button id="toggleSidebarBtn" title="Toggle Sidebar">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
          </svg>
        </button>
        <h1 class="text-xl font-semibold">BadiliCash Dashboard</h1>
      </div>

      <!-- Profile Section -->
      <div class="relative inline-block text-left">
        <button id="profileButton" type="button"
          class="flex items-center focus:outline-none select-none gap-2">
          <img src="https://ui-avatars.com/api/?name=Admin" alt="User"
            class="w-8 h-8 rounded-full border border-white">
          <span class="text-white font-medium">Admin</span>
          <svg id="arrowIcon" class="ml-1 w-4 h-4 text-white transition-transform duration-200"
            fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z"
              clip-rule="evenodd" />
          </svg>
        </button>

        <!-- Dropdown Menu -->
        <div id="dropdownMenu"
          class="hidden absolute right-0 mt-2 w-44 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-[9999]"
          role="menu" aria-hidden="true">
          <a href="{{ route('user.profile') }}"
            class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-700">My Profile</a>

          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
              class="w-full text-left px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-700">
              Logout
            </button>
          </form>
        </div>
      </div>
    </header>

    <!-- Breadcrumb -->
    <div class="breadcrumb-wrapper bg-white shadow-sm border-b border-gray-200 p-3 flex items-center justify-between">
      @include('components.breadcrumb')
    </div>

    <!-- Page Content -->
    <main>
      @yield('content')
    </main>
  </div>

  <!-- JS -->
  <script>
    // Sidebar toggle
    document.getElementById('toggleSidebarBtn').addEventListener('click', () => {
      const sidebar = document.getElementById('sidebar');
      const mainContent = document.getElementById('mainContent');
      sidebar.classList.toggle('collapsed');
      mainContent.classList.toggle('expanded');
    });

    // Profile dropdown
    document.addEventListener('DOMContentLoaded', function () {
      const profileButton = document.getElementById('profileButton');
      const dropdownMenu = document.getElementById('dropdownMenu');
      const arrowIcon = document.getElementById('arrowIcon');

      if (!profileButton || !dropdownMenu) return;

      profileButton.addEventListener('click', function (e) {
        e.stopPropagation();
        const isHidden = dropdownMenu.classList.contains('hidden');
        if (isHidden) {
          dropdownMenu.classList.remove('hidden');
          dropdownMenu.classList.add('dropdown-appear');
          arrowIcon.style.transform = 'rotate(180deg)';
        } else {
          dropdownMenu.classList.add('hidden');
          arrowIcon.style.transform = 'rotate(0deg)';
        }
      });

      // Click outside closes dropdown
      document.addEventListener('click', function (e) {
        if (!profileButton.contains(e.target)) {
          dropdownMenu.classList.add('hidden');
          arrowIcon.style.transform = 'rotate(0deg)';
        }
      });

      // ESC key closes dropdown
      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
          dropdownMenu.classList.add('hidden');
          arrowIcon.style.transform = 'rotate(0deg)';
        }
      });
    });
  </script>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  @yield('scripts')

</body>

</html>
