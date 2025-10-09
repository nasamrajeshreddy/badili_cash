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
        Schema::create('api_keys', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('merchant_id');
            $table->string('app_id')->unique();
            $table->string('secret_key')->unique();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_keys');
    }
};
