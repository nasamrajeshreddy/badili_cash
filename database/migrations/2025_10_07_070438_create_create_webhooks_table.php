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
        Schema::create('create_webhooks', function (Blueprint $table) {
            $table->id();
            $table->string('event');        // Event type: payment_success, refund, etc.
            $table->json('payload');        // Raw JSON payload
            $table->string('status')->default('pending'); // pending, processed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_webhooks');
    }
};
