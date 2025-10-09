<style>
  /* Sidebar */
  aside#sidebar {
    width: 16rem;
    transition: transform 0.3s ease;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    overflow-y: auto;
    background: linear-gradient(180deg, #065f46 0%, #0077b6 100%);
    color: white;
    border-bottom: 4px solid #10b981;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 50;
    transform: translateX(0);
  }

  aside#sidebar.collapsed {
    transform: translateX(-100%);
  }

  #sidebarHeader {
    padding: 1rem;
    font-weight: bold;
    font-size: 1.125rem;
    border-bottom: 1px solid #22c55e;
    white-space: nowrap;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  /* ✅ Toggle Button INSIDE sidebar */
  #hamburgerBtn {
    background: #10b981;
    border: none;
    cursor: pointer;
    color: white;
    padding: 0.4rem;
    border-radius: 9999px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
  }

  /* Main content wrapper */
  #dashboardWrapper {
    transition: all 0.3s ease;
    margin-left: 16rem;
  }

  #dashboardWrapper.expanded {
    margin-left: 0;
  }

  /* ✅ Sidebar reopen button */
  #sidebarToggle {
    position: fixed;
    top: 1rem;
    left: 1rem;
    background: #10b981;
    border: none;
    cursor: pointer;
    color: white;
    padding: 0.4rem;
    border-radius: 9999px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    z-index: 60;
  }
</style>

<!-- Sidebar -->
<aside id="sidebar">
  <div id="sidebarHeader">
    <span>BadiliCash</span>
<button id="hamburgerBtn" type="button" title="Collapse sidebar">
      <!-- hamburger icon -->
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
        stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
        <line x1="3" y1="6" x2="21" y2="6" />
        <line x1="3" y1="12" x2="21" y2="12" />
        <line x1="3" y1="18" x2="21" y2="18" />
      </svg>
    </button>
  </div>
  <ul class="mt-4 space-y-2">
    <li>
      <button onclick="toggleDropdown('summaryMenu')"
        class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
        Summary <span>+</span>
      </button>
      <ul id="summaryMenu" class="ml-4 mt-2 space-y-1 hidden">
        <li><a href="{{ route('summary.overview') }}" class="block px-2 py-1 rounded hover:bg-white/20">Overview</a></li>
        <li><a href="{{ route('summary.analytics') }}" class="block px-2 py-1 rounded hover:bg-white/20">Analytics</a></li>
      </ul>
    </li>

        <!-- Transactions -->
        <li>
            <button onclick="toggleDropdown('transactionsMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                Transactions <span>+</span>
            </button>
            <ul id="transactionsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('transactions.index') }}" class="block px-2 py-1 rounded hover:bg-white/20">All Transactions</a></li>
                <li><a href="{{ route('transactions.create') }}" class="block px-2 py-1 rounded hover:bg-white/20">Add Transaction</a></li>
            </ul>
        </li>

        <!-- Settlements -->
        <li class="mt-2">
            <button onclick="toggleDropdown('settlementsMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                Settlements <span>+</span>
            </button>
            <ul id="settlementsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('settlements.index') }}" class="block px-2 py-1 rounded hover:bg-white/20">All Settlements</a></li>
                <li><a href="{{ route('settlements.create') }}" class="block px-2 py-1 rounded hover:bg-white/20">Add Settlement</a></li>
            </ul>
        </li>

        <!-- Payment Links -->
        <li class="mt-2">
            <button onclick="toggleDropdown('paymentMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                Payment Links <span>+</span>
            </button>
            <ul id="paymentMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('payment_links.index') }}" class="block px-2 py-1 rounded hover:bg-white/20">All Payment Links</a></li>
                <li><a href="{{ route('payment_links.create') }}" class="block px-2 py-1 rounded hover:bg-white/20">Add Payment Link</a></li>
            </ul>
        </li>

        <!-- Refunds -->
        <li class="mt-2">
            <button onclick="toggleDropdown('refundMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                Refunds <span>+</span>
            </button>
            <ul id="refundMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('refunds.index') }}" class="block px-2 py-1 rounded hover:bg-white/20">All Refund Transactions</a></li>
                <li><a href="{{ route('refunds.create') }}" class="block px-2 py-1 rounded hover:bg-white/20">Add Refund</a></li>
            </ul>
        </li>

        <!-- Payouts -->
        <li class="mt-2">
            <button onclick="toggleDropdown('payoutsMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                Payouts <span>+</span>
            </button>
            <ul id="payoutsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('payouts.index') }}" class="block px-2 py-1 rounded hover:bg-white/20">All Payouts</a></li>
                <li><a href="{{ route('payouts.create') }}" class="block px-2 py-1 rounded hover:bg-white/20">Add Payout</a></li>
            </ul>
        </li>

        <!-- Merchants -->
        <li class="mt-2">
            <button onclick="toggleDropdown('merchantsMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                Merchants <span>+</span>
            </button>
            <ul id="merchantsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('merchants.index') }}" class="block px-2 py-1 rounded hover:bg-white/20">All Merchants</a></li>
                <li><a href="{{ route('merchants.create') }}" class="block px-2 py-1 rounded hover:bg-white/20">Add Merchant</a></li>
            </ul>
        </li>

        <!-- Customers -->
        <li class="mt-2">
            <button onclick="toggleDropdown('customersMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                Customers <span>+</span>
            </button>
            <ul id="customersMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('customers.index') }}" class="block px-2 py-1 rounded hover:bg-white/20">All Customers</a></li>
                <li><a href="{{ route('customers.create') }}" class="block px-2 py-1 rounded hover:bg-white/20">Add Customer</a></li>
            </ul>
        </li>

        <!-- Disputes -->
        <li class="mt-2">
            <button onclick="toggleDropdown('disputesMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                Disputes <span>+</span>
            </button>
            <ul id="disputesMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('disputes.index') }}" class="block px-2 py-1 rounded hover:bg-white/20">All Disputes</a></li>
                <li><a href="{{ route('disputes.create') }}" class="block px-2 py-1 rounded hover:bg-white/20">Add Dispute</a></li>
            </ul>
        </li>

        <!-- Chargebacks -->
        <li class="mt-2">
            <button onclick="toggleDropdown('chargebacksMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                Chargebacks <span>+</span>
            </button>
            <ul id="chargebacksMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('chargebacks.index') }}" class="block px-2 py-1 rounded hover:bg-white/20">All Chargebacks</a></li>
                <li><a href="{{ route('chargebacks.create') }}" class="block px-2 py-1 rounded hover:bg-white/20">Add Chargeback</a></li>
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


        <!-- API Logs -->
        <li class="mt-2">
            <button onclick="toggleDropdown('apiLogsMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                API Logs <span>+</span>
            </button>
            <ul id="apiLogsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('api_logs.index') }}" class="block px-2 py-1 rounded hover:bg-white/20">All Logs</a></li>
                <li><a href="{{ route('api_logs.create') }}" class="block px-2 py-1 rounded hover:bg-white/20">Add Log</a></li>
            </ul>
        </li>

        <!-- Webhooks -->
        <li class="mt-2">
            <button onclick="toggleDropdown('webhooksMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                Webhooks <span>+</span>
            </button>
            <ul id="webhooksMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('webhooks.index') }}" class="block px-2 py-1 rounded hover:bg-white/20">All Webhooks</a></li>
                <li><a href="{{ route('webhooks.create') }}" class="block px-2 py-1 rounded hover:bg-white/20">Add Webhook</a></li>
            </ul>
        </li>
    </ul>
</aside>

<!-- Sidebar reopen button -->
<button id="sidebarToggle" class="hidden" title="Open sidebar">
  <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
    stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
    <polyline points="9 18 15 12 9 6" />
  </svg>
</button>

<!-- Dashboard -->
<div id="dashboardWrapper">
  <div class="p-6">
   <!-- <h1 class="text-2xl font-bold">Dashboard Content</h1>-->
  </div>
</div>
<script>
  function toggleDropdown(id) {
    const menu = document.getElementById(id);
    menu.classList.toggle('hidden');
  }

  const sidebar = document.getElementById('sidebar');
  const dashboard = document.getElementById('dashboardWrapper');
  const hamburgerBtn = document.getElementById('hamburgerBtn');
  const sidebarToggle = document.getElementById('sidebarToggle');

  // ✅ Collapse sidebar when hamburger clicked
  hamburgerBtn.addEventListener('click', (e) => {
    e.preventDefault(); // stop page reload
    sidebar.classList.toggle('collapsed');
    dashboard.classList.toggle('expanded');
    sidebarToggle.classList.toggle('hidden');
  });

  // ✅ Reopen sidebar when arrow clicked
  sidebarToggle.addEventListener('click', (e) => {
    e.preventDefault();
    sidebar.classList.toggle('collapsed');
    dashboard.classList.toggle('expanded');
    sidebarToggle.classList.toggle('hidden');
  });
</script>
<script>
document.addEventListener('click', function (e) {
  const sidebar = document.getElementById('sidebar');
  const dashboard = document.getElementById('dashboardWrapper');
  const sidebarToggle = document.getElementById('sidebarToggle');
  const hamburgerBtn = document.getElementById('hamburgerBtn');

  if (!hamburgerBtn || !sidebar || !dashboard || !sidebarToggle) {
    console.warn('Sidebar elements not found yet');
    return;
  }

  // If hamburger clicked
  if (e.target.closest('#hamburgerBtn')) {
    sidebar.classList.add('collapsed');
    dashboard.classList.add('expanded');
    sidebarToggle.classList.remove('hidden');
    console.log('✅ Sidebar collapsed');
  }

  // If reopen arrow clicked
  if (e.target.closest('#sidebarToggle')) {
    sidebar.classList.remove('collapsed');
    dashboard.classList.remove('expanded');
    sidebarToggle.classList.add('hidden');
    console.log('✅ Sidebar reopened');
  }
});
</script>


