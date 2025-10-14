<style>
/* Sidebar base */
aside#sidebar {
    width: 16rem;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    overflow-y: auto;
    background: linear-gradient(180deg, #4b0082 0%, #001f3f 100%); /* purple to navy */
    color: #ffffff;
    font-family: 'Comic Sans MS', sans-serif;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    z-index: 50;
    transition: transform 0.3s ease, background 0.3s ease;
}

/* Collapsed sidebar */
aside#sidebar.collapsed {
    transform: translateX(-100%);
}

/* Sidebar header */
#sidebarHeader {
    padding: 1rem;
    font-weight: 500;
    font-size: 1rem;
    border-bottom: 2px solid #7f5af0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
}

/* Hamburger button */
#hamburgerBtn {
    background: #7f5af0;
    border: none;
    color: white;
    padding: 0.4rem;
    border-radius: 50%;
    cursor: pointer;
    transition: transform 0.3s;
}
#hamburgerBtn:hover { transform: scale(1.1); }

/* Sidebar links */
aside#sidebar ul li button {
   font-family: 'Comic Sans MS', sans-serif;
    font-weight: 10;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}
aside#sidebar ul li button:hover {
    background: rgba(255,255,255,0.1);
    color: #7f5af0;
}

/* Active tab */
aside#sidebar ul li button.active,
aside#sidebar ul li a.active {
    background: #7f5af0;
    color: #ffffff;
    font-weight: 600;
    border-radius: 6px;
}

/* Dropdown arrows */
aside#sidebar ul li button span {
    display: inline-block;
    transition: transform 0.3s ease;
}
aside#sidebar ul li button.open span {
    transform: rotate(90deg); /* rotate arrow when open */
}

/* Dropdown menu */
aside#sidebar ul li ul {
    transition: all 0.3s ease;
}
aside#sidebar ul li ul li a {
    font-size: 0.75rem;
    padding-left: 1rem;
    color: #d1d5db;
    transition: all 0.2s;
}
aside#sidebar ul li ul li a:hover {
    color: #7f5af0;
}

/* Scrollbar styling */
aside#sidebar::-webkit-scrollbar {
    width: 6px;
}
aside#sidebar::-webkit-scrollbar-track {
    background: transparent;
}
aside#sidebar::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,0.2);
    border-radius: 10px;
}

/* Smooth text */
aside#sidebar ul li button, aside#sidebar ul li a {
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
}

/* Dashboard wrapper transition */
#dashboardWrapper {
    transition: margin-left 0.3s ease;
    margin-left: 16rem;
}
#dashboardWrapper.expanded { margin-left: 0; }
</style>


<!-- Sidebar -->
<!--<aside id="sidebar">--><!--this isw disabled after push we made to escape two scroll down bars 09/10/2025-->
  <div id="sidebarHeader" class="flex justify-center p-4 border-b border-white/20">
    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Ftracxn.com%2Fd%2Fcompanies%2Fagdp-fintech%2F__P2fVZbrAzC-SENUwhp6eM3bWRRzE1RbrT5JepcsxIm0&psig=AOvVaw0G2rBjl3-wnNPPd60sSG7e&ust=1760431755289000&source=images&cd=vfe&opi=89978449&ved=0CBUQjRxqFwoTCMCjlr_loJADFQAAAAAdAAAAABAE" 
         alt="BadiliCash Logo" 
         class="h-8 w-auto" 
         style="margin-top: 60px;">
<!-- <button id="hamburgerBtn" type="button" title="Collapse sidebar">
       hamburger icon
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
        stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
        <line x1="3" y1="6" x2="21" y2="6" />
        <line x1="3" y1="12" x2="21" y2="12" />
        <line x1="3" y1="18" x2="21" y2="18" />
      </svg>
    </button> -->
  </div>
  <!-- <ul class="mt-4 space-y-2"> -->
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


         <!-- Merchants on board -->
        <li class="mt-2">
            <button onclick="toggleDropdown('merchantsMenu')" class="w-full text-left px-4 py-2 hover:bg-white/10 flex justify-between items-center rounded">
                Merchants onboard <span>+</span>
            </button>
            <ul id="merchantsMenu" class="ml-4 mt-2 space-y-1 hidden">
                <li><a href="{{ route('merchant.kyc.show') }}" class="block px-2 py-1 rounded hover:bg-white/20">KYC</a></li>
                <li><a href="{{ route('merchant.onboard.show') }}" class="block px-2 py-1 rounded hover:bg-white/20">Onboard</a></li>
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


<!-----settings -->

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

<!-- Sidebar reopen button --><!--this isw disabled after push we made to escape two scroll down bars 09/10/2025-->
<!--<button id="sidebarToggle" class="hidden" title="Open sidebar">
  <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
    stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
    <polyline points="9 18 15 12 9 6" />
  </svg>
</button>-->

<!-- Dashboard -->
<div id="dashboardWrapper">
  <div class="p-6">
   <!-- <h1 class="text-2xl font-bold">Dashboard Content</h1>-->
  </div>
</div>
<script>
function toggleDropdown(id, btn) {
    const menu = document.getElementById(id);
    const allMenus = document.querySelectorAll('aside#sidebar ul li ul');
    const allButtons = document.querySelectorAll('aside#sidebar ul li > button');

    // Close all other dropdowns
    allMenus.forEach(m => { if (m.id !== id) m.classList.add('hidden'); });
    allButtons.forEach(b => { if (b !== btn) b.classList.remove('open'); });

    // Toggle current dropdown
    menu.classList.toggle('hidden');
    btn.classList.toggle('open');
}

// Highlight active link based on current URL
document.querySelectorAll('aside#sidebar a').forEach(link => {
    if (link.href === window.location.href) {
        link.classList.add('active');
        const parentBtn = link.closest('ul').previousElementSibling;
        if (parentBtn) parentBtn.classList.add('open');
        link.closest('ul').classList.remove('hidden');
    }
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


