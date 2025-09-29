<aside class="w-64 bg-gray-800 text-white min-h-screen">
    <div class="p-4 font-bold text-lg border-b border-gray-700">Badili Cash</div>
    <ul class="mt-4">

        <!-- Transactions -->
        <li>
            <button onclick="toggleDropdown('transactionsMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Transactions <span>+</span>
            </button>
            <ul id="transactionsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('transactions.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">All Transactions</a></li>
                <li><a href="{{ route('transactions.create') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Add Transaction</a></li>
            </ul>
        </li>

        <!-- Settlements -->
        <li class="mt-2">
            <button onclick="toggleDropdown('settlementsMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Settlements <span>+</span>
            </button>
            <ul id="settlementsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('settlements.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">All Settlements</a></li>
                <li><a href="{{ route('settlements.create') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Add Settlement</a></li>
            </ul>
        </li>

        <!-- Payment Links -->
        <li class="mt-2">
            <button onclick="toggleDropdown('paymentMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Payment Links <span>+</span>
            </button>
            <ul id="paymentMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('payment_links.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">All Payment Links</a></li>
                <li><a href="{{ route('payment_links.create') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Add Payment Link</a></li>
            </ul>
        </li>

        <!-- Refunds -->
        <li class="mt-2">
            <button onclick="toggleDropdown('refundMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Refunds <span>+</span>
            </button>
            <ul id="refundMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('refunds.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">All Refund Transactions</a></li>
                <li><a href="{{ route('refunds.create') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Add Refund</a></li>
            </ul>
        </li>

        <!-- Payouts -->
        <li class="mt-2">
            <button onclick="toggleDropdown('payoutsMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Payouts <span>+</span>
            </button>
            <ul id="payoutsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('payouts.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">All Payouts</a></li>
                <li><a href="{{ route('payouts.create') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Add Payout</a></li>
            </ul>
        </li>

        <!-- 🔹 Merchants -->
        <li class="mt-2">
            <button onclick="toggleDropdown('merchantsMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Merchants <span>+</span>
            </button>
            <ul id="merchantsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('merchants.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">All Merchants</a></li>
                <li><a href="{{ route('merchants.create') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Add Merchant</a></li>
            </ul>
        </li>

    </ul>
</aside>

<!-- JS for dropdown -->
<script>
function toggleDropdown(id) {
    const menu = document.getElementById(id);
    menu.classList.toggle('hidden');
}
</script>    