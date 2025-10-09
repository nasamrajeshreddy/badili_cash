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
        Schema::create('fees_commissions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Fee/Commission name
            $table->enum('type', ['flat', 'percentage']); // Fee type
            $table->decimal('value', 12, 2); // Fee amount or percentage
            $table->string('applied_on')->default('transaction'); // transaction / payout
            $table->boolean('active')->default(true); // enable / disable

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_commissions');
    }
};
