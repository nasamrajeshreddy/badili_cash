<aside class="w-64 bg-gray-800 text-white min-h-screen">
    <div class="p-4 font-bold text-lg border-b border-gray-700">BadiliCash</div>
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
        <!-- Customers -->
        <li class="mt-2">
            <button onclick="toggleDropdown('customersMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Customers <span>+</span>
            </button>
            <ul id="customersMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('customers.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">All Customers</a></li>
                <li><a href="{{ route('customers.create') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Add Customer</a></li>
            </ul>
        </li>
        <!-- Disputes -->
        <li class="mt-2">
            <button onclick="toggleDropdown('disputesMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Disputes <span>+</span>
            </button>
            <ul id="disputesMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('disputes.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">All Disputes</a></li>
                <li><a href="{{ route('disputes.create') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Add Dispute</a></li>
            </ul>
        </li>
        <!-- Chargebacks -->
        <li class="mt-2">
            <button onclick="toggleDropdown('chargebacksMenu')"
                class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Chargebacks <span>+</span>
            </button>
            <ul id="chargebacksMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li>
                    <a href="{{ route('chargebacks.index') }}"
                        class="hover:text-yellow-400 block px-2 py-1 rounded">
                        All Chargebacks
                    </a>
                </li>
                <li>
                    <a href="{{ route('chargebacks.create') }}"
                        class="hover:text-yellow-400 block px-2 py-1 rounded">
                        Add Chargeback
                    </a>
                </li>
            </ul>
        </li>




        <li class="mt-2">
            <button onclick="toggleDropdown('apiLogsMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                API Logs <span>+</span>
            </button>
            <ul id="apiLogsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('api_logs.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">All Logs</a></li>
                <li><a href="{{ route('api_logs.create') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Add Log</a></li>
            </ul>
        </li>

        <li class="mt-2">
            <button onclick="toggleDropdown('webhooksMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Webhooks <span>+</span>
            </button>
            <ul id="webhooksMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li>
                    <a href="{{ route('webhooks.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">
                        All Webhooks
                    </a>
                </li>
                <li>
                    <a href="{{ route('webhooks.create') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">
                        Add Webhook
                    </a>
                </li>
            </ul>
        </li>


        <li class="mt-2">
            <button onclick="toggleDropdown('apiKeysMenu')"
                class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                API Keys <span>+</span>
            </button>
            <ul id="apiKeysMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li>
                    <a href="{{ route('api_keys.index') }}"
                        class="hover:text-yellow-400 block px-2 py-1 rounded">
                        All API Keys
                    </a>
                </li>
                <li>
                    <a href="{{ route('api_keys.create') }}"
                        class="hover:text-yellow-400 block px-2 py-1 rounded">
                        Generate API Key
                    </a>
                </li>
            </ul>
        </li>

        <li class="mt-2">
            <button onclick="toggleDropdown('developerMenu')"
                class="w-full text-left px-4 py-2 hover:bg-gray-700  flex justify-between items-center">
                Developer Tools <span>+</span>
            </button>
            <ul id="developerMenu" class="ml-4 mhover:bg-gray-700t-2 space-y-1 hidden">
                <li>
                    <a href="{{ route('api_keys.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">API Keys</a>
                </li>
                <li>
                    <a href="{{ route('api_docs.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">API Documentation</a>
                </li>
                <li>
                    <a href="{{ route('sdk.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">SDKs & Plugins</a>
                </li>
                <li>
                    <a href="{{ route('sandbox.logs') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Sandbox Logs</a>
                </li>
            </ul>
        </li>
        <li class="mt-2 ml-2 mb-2">
            <a href="{{ route('settings.index') }}"
                class="hover:text-yellow-400 hover:bg-gray-700 block px-2 py-1 rounded">
                Settings
            </a>
        </li>
        <li class="mt-2 ml-2 mb-2">
            <a href="{{ route('notifications.index') }}"
                class="hover:text-yellow-400 hover:bg-gray-700 block px-2 py-1 rounded">
                Notifications
            </a>
        </li>

        <li class="mt-2 ml-2 mb-2">
            <a href="{{ route('audit_logs.index') }}"
                class="hover:text-yellow-400 hover:bg-gray-700 block px-2 py-1 rounded">
                Audit / Activity Logs
            </a>
        </li>

        <li class="mt-2 ml-2 mb-2">
            <a href="{{ route('system_health.index') }}"
                class="hover:text-yellow-400 hover:bg-gray-700 block px-2 py-1 rounded">
                System Health
            </a>
        </li>




        <li class="mt-2">
            <button onclick="toggleDropdown('reconciliationMenu')"
                class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Reconciliation <span>+</span>
            </button>
            <ul id="reconciliationMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('reconciliation.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Dashboard</a></li>
                <li><a href="{{ route('reconciliation.upload') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Upload CSV</a></li>
                <li><a href="{{ route('reconciliation.files') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">Uploaded Files</a></li>
            </ul>
        </li>




        <li class="mt-2">
            <button onclick="toggleDropdown('feesMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Fees & Commissions <span>+</span>
            </button>
            <ul id="feesMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li>
                    <a href="{{ route('fees_commissions.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">
                        All Fees & Commissions
                    </a>
                </li>
                <li>
                    <a href="{{ route('fees_commissions.create') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">
                        Add Fee / Commission
                    </a>
                </li>
            </ul>
        </li>



        <!-- New RBAC Menu -->
        <li class="mt-2">
            <button onclick="toggleDropdown('rolesMenu')"
                class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                <span class="flex items-center space-x-2">
                    <i class="fa fa-users-cog"></i>
                    <span>Roles & Permissions</span>
                </span>
                <span>+</span>
            </button>
            <ul id="rolesMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('roles.index') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">All Roles</a></li>
                <li><a href="{{ route('roles.create') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">Create Role</a></li>
            </ul>
        </li>
        <li class="mt-2">
            <button onclick="toggleDropdown('supportMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Support Tickets <span>+</span>
            </button>
            <ul id="supportMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li>
                    <a href="{{ route('admin.tickets.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">
                        All Tickets
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.support.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">
                        Create Ticket
                    </a>
                </li>
            </ul>
        </li>


        <li class="mt-2">
            <button onclick="toggleDropdown('supportMenu')" class="w-full text-left px-4 py-2 hover:bg-gray-700 flex justify-between items-center">
                Support Tickets <span>+</span>
            </button>
            <ul id="supportMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li>
                    <a href="{{ route('admin.tickets.index') }}" class="hover:text-yellow-400 block px-2 py-1 rounded">
                        All Tickets
                    </a>
                </li>
            </ul>
        </li>

    </ul>
    </ul>
</aside>

<!-- JS for dropdown -->
<script>
    function toggleDropdown(id) {
        const menu = document.getElementById(id);
        menu.classList.toggle('hidden');
    }
</script>