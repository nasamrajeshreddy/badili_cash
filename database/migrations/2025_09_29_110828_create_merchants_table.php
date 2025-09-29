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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();

            // Business Info
            $table->string('business_name');
            $table->string('business_type')->nullable(); // Individual, Pvt Ltd, LLP, etc.
            $table->string('gst_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('license_doc')->nullable(); // File upload path

            // Contact Person
            $table->string('contact_name');
            $table->string('email')->unique();
            $table->string('phone', 15)->unique();

            // Bank Account for Settlements
            $table->string('bank_account');
            $table->string('ifsc');
            $table->string('bank_name')->nullable();

            // System fields
            $table->enum('status', ['pending', 'approved', 'rejected', 'suspended'])->default('pending');
            $table->decimal('commission_rate', 5, 2)->default(0.00); // % commission per merchant

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
