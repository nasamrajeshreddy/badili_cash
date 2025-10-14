<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('refunds', function (Blueprint $table) {
            // Only add columns if they don't already exist
            if (!Schema::hasColumn('refunds', 'payment_id')) {
                $table->string('payment_id')->after('refund_id');
            }

            if (!Schema::hasColumn('refunds', 'currency')) {
                $table->string('currency', 10)->after('amount');
            }

            if (!Schema::hasColumn('refunds', 'reason')) {
                $table->string('reason')->after('currency');
            }

            // Safely modify enum column if exists
            if (Schema::hasColumn('refunds', 'status')) {
                $table->enum('status', ['initiated', 'pending', 'processed', 'failed'])
                      ->default('initiated')
                      ->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('refunds', function (Blueprint $table) {
            if (Schema::hasColumn('refunds', 'payment_id')) {
                $table->dropColumn('payment_id');
            }

            if (Schema::hasColumn('refunds', 'currency')) {
                $table->dropColumn('currency');
            }

            if (Schema::hasColumn('refunds', 'reason')) {
                $table->dropColumn('reason');
            }
        });
    }
};
