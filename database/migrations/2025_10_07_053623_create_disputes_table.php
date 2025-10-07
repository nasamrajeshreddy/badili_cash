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
        Schema::create('disputes', function (Blueprint $table) {
            $table->id();
             $table->string('dispute_id')->unique();
        $table->unsignedBigInteger('transaction_id')->nullable();
        $table->string('customer_name');
        $table->string('email')->nullable();
        $table->string('reason');
        $table->enum('status', ['open', 'under_review', 'resolved'])->default('open');
        $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disputes');
    }
};
