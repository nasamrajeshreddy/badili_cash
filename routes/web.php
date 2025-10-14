<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLogController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\DisputeController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\CustomerController;


use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ChargebackController;
use App\Http\Controllers\ApiKeyController;
use App\Http\Controllers\ApiDocumentationController;
use App\Http\Controllers\SdkController;
use App\Http\Controllers\SandboxLogController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\SystemHealthController;
use App\Http\Controllers\ReconciliationController;
use App\Http\Controllers\FeeCommissionController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\PaymentLinkController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\KycController;





use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\TicketReplyController;
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

// User Profile
Route::get('/user_profile', function () {
    return view('profile.userprofile');
})->name('user.profile');





    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions/store', [TransactionController::class, 'store'])->name('transactions.store');

    // Settlements
    Route::get('/settlements', [SettlementController::class, 'index'])->name('settlements.index');
    Route::get('/settlements/create', [SettlementController::class, 'create'])->name('settlements.create');
    Route::post('/settlements/store', [SettlementController::class, 'store'])->name('settlements.store');

    // Payment Links
    Route::get('/payment-links', [PaymentLinkController::class, 'index'])->name('payment_links.index');
    Route::get('/payment-links/create', [PaymentLinkController::class, 'create'])->name('payment_links.create');
    Route::post('/payment-links/store', [PaymentLinkController::class, 'store'])->name('payment_links.store');



    //refund routes
    Route::get('/refunds', [RefundController::class, 'index'])->name('refunds.index');
    Route::get('/refunds/create', [RefundController::class, 'create'])->name('refunds.create');
    Route::post('/refunds/store', [RefundController::class, 'store'])->name('refunds.store');
    Route::post('/refunds/{id}/update-status', [RefundController::class, 'updateStatus'])->name('refunds.updateStatus');




    Route::get('/payouts', [PayoutController::class, 'index'])->name('payouts.index');
    Route::get('/payouts/create', [PayoutController::class, 'create'])->name('payouts.create');
    Route::post('/payouts', [PayoutController::class, 'store'])->name('payouts.store');
    Route::get('/payouts/{payout}/edit', [PayoutController::class, 'edit'])->name('payouts.edit');
    Route::post('/payouts/{payout}/status', [PayoutController::class, 'updateStatus'])->name('payouts.updateStatus');



// Merchant Onboarding Routes
Route::prefix('merchant')->group(function () {

    // KYC Form
    Route::get('/kyc', [KycController::class, 'showForm'])->name('merchant.kyc.show');
    Route::post('/kyc', [KycController::class, 'submitForm'])->name('merchant.kyc.submit');

    // Onboarding
    Route::get('/onboard', [MerchantOnboardController::class, 'showOnboardForm'])->name('merchant.onboard.show');
    Route::post('/onboard', [MerchantOnboardController::class, 'submitOnboard'])->name('merchant.onboard.submit');

});


    // Show all merchants (Admin Panel)
    Route::get('/merchants', [MerchantController::class, 'index'])->name('merchants.index');

    // Show merchant registration form
    Route::get('/merchants/create', [MerchantController::class, 'create'])->name('merchants.create');

    // Store new merchant
    Route::post('/merchants', [MerchantController::class, 'store'])->name('merchants.store');

    // (Optional future routes)
    // Show a single merchant
    Route::get('/merchants/{merchant}', [MerchantController::class, 'show'])->name('merchants.show');

    // Edit merchant
    Route::get('/merchants/{merchant}/edit', [MerchantController::class, 'edit'])->name('merchants.edit');

    // Update merchant
    Route::put('/merchants/{merchant}', [MerchantController::class, 'update'])->name('merchants.update');

    // Delete merchant
    Route::delete('/merchants/{merchant}', [MerchantController::class, 'destroy'])->name('merchants.destroy');


    //Route::post('/payment-links/store', [PaymentLinkController::class, 'store'])->name('payment_links.store');
    Route::post('/payment-links', [PaymentLinkController::class, 'store'])->name('payment_links.store');

    // Public payment page
    Route::get('/pay/{uuid}', [PaymentLinkController::class, 'show'])->name('payment_links.show');
    // Public payment page
    Route::get('/pay/{uuid}', [PaymentLinkController::class, 'show'])->name('payment_links.show');



    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');


    // Disputes Routes
    Route::get('/disputes', [DisputeController::class, 'index'])->name('disputes.index');
    Route::get('/disputes/create', [DisputeController::class, 'create'])->name('disputes.create');
    Route::post('/disputes/store', [DisputeController::class, 'store'])->name('disputes.store');
    Route::get('/disputes/edit/{id}', [DisputeController::class, 'edit'])->name('disputes.edit');
    Route::post('/disputes/update/{id}', [DisputeController::class, 'update'])->name('disputes.update');
    Route::get('/disputes/delete/{id}', [DisputeController::class, 'destroy'])->name('disputes.delete');




    Route::get('/chargebacks', [ChargebackController::class, 'index'])->name('chargebacks.index');
    Route::get('/chargebacks/create', [ChargebackController::class, 'create'])->name('chargebacks.create');
    Route::post('/chargebacks/store', [ChargebackController::class, 'store'])->name('chargebacks.store');
    Route::get('/chargebacks/edit/{id}', [ChargebackController::class, 'edit'])->name('chargebacks.edit');
    Route::post('/chargebacks/update/{id}', [ChargebackController::class, 'update'])->name('chargebacks.update');
    Route::get('/chargebacks/delete/{id}', [ChargebackController::class, 'destroy'])->name('chargebacks.delete');



    Route::get('/api-logs', [ApiLogController::class, 'index'])->name('api_logs.index');
    Route::get('/api-logs/create', [ApiLogController::class, 'create'])->name('api_logs.create');
    Route::post('/api-logs/store', [ApiLogController::class, 'store'])->name('api_logs.store');
    Route::get('/api-logs/{id}', [ApiLogController::class, 'show'])->name('api_logs.show');




    // Webhook handler (API)
    Route::post('/webhook/badilicash', [WebhookController::class, 'handle']);

    // Admin Webhooks - CRUD
    Route::get('/admin/webhooks', [WebhookController::class, 'index'])->name('webhooks.index');

    // CREATE must come BEFORE {id}!
    Route::get('/admin/webhooks/create', [WebhookController::class, 'create'])->name('webhooks.create');
    Route::post('/admin/webhooks/store', [WebhookController::class, 'store'])->name('webhooks.store');

    // SHOW single webhook (dynamic) - must be after create
    Route::get('/admin/webhooks/{id}', [WebhookController::class, 'show'])->name('webhooks.show');



    Route::prefix('admin')->group(function () {
        Route::get('/api-keys', [ApiKeyController::class, 'index'])->name('api_keys.index');
        Route::get('/api-keys/create', [ApiKeyController::class, 'create'])->name('api_keys.create');
        Route::post('/api-keys', [ApiKeyController::class, 'store'])->name('api_keys.store');
        Route::get('/api-keys/toggle/{id}', [ApiKeyController::class, 'toggleStatus'])->name('api_keys.toggle');
    });

    //summary routes
    Route::get('/overview', [SummaryController::class, 'overview'])->name('summary.overview');
    Route::get('/analytics', [SummaryController::class, 'analytics'])->name('summary.analytics');

    Route::prefix('admin')->group(function () {
        Route::get('/api-docs', [ApiDocumentationController::class, 'index'])->name('api_docs.index');
        Route::get('/api-docs/{endpoint}', [ApiDocumentationController::class, 'show'])->name('api_docs.show');
    });



    Route::prefix('admin')->group(function () {
        Route::get('/sdks', [SdkController::class, 'index'])->name('sdk.index');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/sandbox-logs', [SandboxLogController::class, 'index'])->name('sandbox.logs');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    });



    Route::prefix('admin')->group(function () {
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
        Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
        Route::post('/notifications/{id}/mark-read', [NotificationController::class, 'markAsRead'])->name('notifications.markRead');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/audit-logs', [AuditLogController::class, 'index'])->name('audit_logs.index');
        Route::get('/audit-logs/{id}', [AuditLogController::class, 'show'])->name('audit_logs.show');
    });


    Route::prefix('admin')->group(function () {
        Route::get('/system-health', [SystemHealthController::class, 'index'])->name('system_health.index');
        Route::get('/system-health/check', [SystemHealthController::class, 'check'])->name('system_health.check');
    });


    Route::prefix('admin')->group(function () {
        Route::get('/reconciliation', [ReconciliationController::class, 'index'])->name('reconciliation.index');
        Route::get('/reconciliation/upload', [ReconciliationController::class, 'uploadForm'])->name('reconciliation.uploadForm');
        Route::post('/reconciliation/upload', [ReconciliationController::class, 'upload'])->name('reconciliation.upload');
        Route::get('/reconciliation/files', [ReconciliationController::class, 'files'])->name('reconciliation.files');
        Route::get('/reconciliation/download/{filename}', [ReconciliationController::class, 'download'])->name('reconciliation.download');
        Route::get('/reconciliation/{id}', [ReconciliationController::class, 'show'])->name('reconciliation.show');
    });



    Route::prefix('admin')->group(function () {
        Route::get('/fees-commissions', [FeeCommissionController::class, 'index'])->name('fees_commissions.index');
        Route::get('/fees-commissions/create', [FeeCommissionController::class, 'create'])->name('fees_commissions.create');
        Route::post('/fees-commissions', [FeeCommissionController::class, 'store'])->name('fees_commissions.store');
        Route::get('/fees-commissions/{feeCommission}/edit', [FeeCommissionController::class, 'edit'])->name('fees_commissions.edit');
        Route::put('/fees-commissions/{feeCommission}', [FeeCommissionController::class, 'update'])->name('fees_commissions.update');
        Route::get('/fees-commissions/toggle/{feeCommission}', [FeeCommissionController::class, 'toggleStatus'])->name('fees_commissions.toggle');
    });


//summary routes
Route::get('/overview', [SummaryController::class, 'overview'])->name('summary.overview');
Route::get('/analytics', [SummaryController::class, 'analytics'])->name('summary.analytics');



});


    // Route::middleware(['auth'])->group(function () {
    //     Route::get('/admin/support-tickets', [SupportTicketController::class, 'index'])->name('support_tickets.index');
    //     Route::get('/admin/support-tickets/create', [SupportTicketController::class, 'create'])->name('support_tickets.create');
    //     Route::post('/admin/support-tickets', [SupportTicketController::class, 'store'])->name('support_tickets.store');
    //     Route::get('/admin/support-tickets/{id}', [SupportTicketController::class, 'show'])->name('support_tickets.show');
    //     Route::put('/admin/support-tickets/{id}', [SupportTicketController::class, 'update'])->name('support_tickets.update');
    //     Route::delete('/admin/support-tickets/{id}', [SupportTicketController::class, 'destroy'])->name('support_tickets.destroy');
    // Route::post('/admin/support-tickets/{id}/reply', [SupportTicketController::class, 'addReply'])->name('support_tickets.reply');
    // Route::post('/admin/support-tickets/{id}/update', [SupportTicketController::class, 'update'])->name('support_tickets.update');


    // });
// User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/support', [SupportTicketController::class, 'index'])->name('user.tickets.index');
    Route::get('/support/create', [SupportTicketController::class, 'create'])->name('user.tickets.create');
    Route::post('/support', [SupportTicketController::class, 'store'])->name('user.tickets.store');
    Route::get('/support/{ticket}', [SupportTicketController::class, 'show'])->name('user.tickets.show');
    Route::post('/support/{ticket}/reply', [TicketReplyController::class, 'store'])->name('user.tickets.reply');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/tickets', [SupportTicketController::class, 'adminIndex'])->name('admin.tickets.index');
    Route::get('/tickets/{ticket}', [SupportTicketController::class, 'adminShow'])->name('admin.tickets.show');
    Route::post('/tickets/{ticket}/reply', [TicketReplyController::class, 'adminReply'])->name('admin.tickets.reply');
});





