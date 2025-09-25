<header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">Badili Cash Dashboard</h1>
    <div>
        <span class="mr-4">{{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-red-500">Logout</button>
        </form>
    </div>
</header>
