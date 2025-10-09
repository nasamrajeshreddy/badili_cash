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
        Schema::create('reconciliations', function (Blueprint $table) {
            $table->id();
             $table->string('transaction_id');
    $table->string('bank_reference')->nullable();
    $table->decimal('amount', 12, 2);
    $table->enum('status', ['matched', 'mismatch', 'missing'])->default('missing');
    $table->text('remarks')->nullable();
      $table->string('file_path')->nullable();
    $table->timestamp('reconciled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reconciliations');
    }
};
