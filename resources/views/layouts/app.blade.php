<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badili Cash - @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="flex-1 flex flex-col">
        <!-- Header -->
        @include('components.header')

        <!-- Breadcrumb -->
        @include('components.breadcrumb')

        <!-- Main Content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</div>

<script>
    // Sidebar dropdown toggle
    function toggleDropdown(id) {
        const menu = document.getElementById(id);
        menu.classList.toggle('hidden');
    }
</script>
</body>
</html>
