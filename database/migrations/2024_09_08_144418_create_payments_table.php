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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billing_id')->constrained('billings')->onDelete('cascade'); // Links to the specific billing
            $table->decimal('amount', 10, 2);  // The payment amount
            $table->foreignId('payment_method_id')->constrained('billing_methods')->onDelete('cascade');  // Payment method
            $table->string('payment_id')->nullable();  // Unique identifier for the payment method (bank, card, etc.)
            $table->date('payment_date');  // When the payment was made
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
