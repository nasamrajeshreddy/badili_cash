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
            //
             $table->string('refund_id')->unique()->after('id');
        $table->string('payment_id')->after('refund_id');
        $table->string('currency', 10)->after('amount');
        $table->string('reason')->after('currency');
        $table->enum('status', ['initiated','pending','processed','failed'])->default('initiated')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('refunds', function (Blueprint $table) {
            //
              $table->dropColumn(['refund_id','payment_id','currency','reason']);
        });
    }
};
