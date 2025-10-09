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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('user_id')->nullable(); // admin/user who triggered
    $table->string('module'); // e.g., 'Refunds', 'API Keys'
    $table->string('action'); // e.g., 'Created', 'Updated', 'Deleted'
    $table->text('description')->nullable(); // details of what happened
    $table->string('ip_address')->nullable();
    $table->string('user_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
