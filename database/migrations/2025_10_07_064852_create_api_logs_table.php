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
        Schema::create('api_logs', function (Blueprint $table) {
            $table->id();
            $table->string('log_id')->unique();
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->string('endpoint');
            $table->enum('method', ['GET', 'POST', 'PUT', 'DELETE']);
            $table->text('request_payload')->nullable();
            $table->text('response_payload')->nullable();
            $table->integer('status_code')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_logs');
    }
};
