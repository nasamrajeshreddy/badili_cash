<aside class="w-64 bg-gray-800 text-white min-h-screen">
    <div class="p-4 font-bold text-lg border-b border-gray-700">Badili Cash</div>
    <ul class="mt-4">

        <!-- Transactions -->
        <li>
            <button onclick="toggleDropdown('transactionsMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between">
                Transactions <span>+</span>
            </button>
            <ul id="transactionsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('transactions.index') }}" class="hover:text-yellow-400">All Transactions</a></li>
                <li><a href="{{ route('transactions.create') }}" class="hover:text-yellow-400">Add Transaction</a></li>
            </ul>
        </li>

        <!-- Settlements -->
        <li class="mt-2">
            <button onclick="toggleDropdown('settlementsMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between">
                Settlements <span>+</span>
            </button>
            <ul id="settlementsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('settlements.index') }}" class="hover:text-yellow-400">All Settlements</a></li>
                <li><a href="{{ route('settlements.create') }}" class="hover:text-yellow-400">Add Settlement</a></li>
            </ul>
        </li>

        <!-- Payment Links -->
        <li class="mt-2">
            <button onclick="toggleDropdown('paymentMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between">
                Payment Link <span>+</span>
            </button>
            <ul id="paymentMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('payment_links.index') }}" class="hover:text-yellow-400">All Payment Links</a></li>
                <li><a href="{{ route('payment_links.create') }}" class="hover:text-yellow-400">Add Payment Link</a></li>
            </ul>
        </li>

    </ul>
</aside>
