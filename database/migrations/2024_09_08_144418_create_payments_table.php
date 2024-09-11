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
        // Schema::create('payments', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('billing_id')->constrained('billings')->onDelete('cascade'); // Links to the specific billing
        //     $table->decimal('amount', 10, 2);  // The payment amount
        //     $table->date('billing_month');  // The month for which the payment was made
        //     $table->foreignId('payment_method_id')->constrained('billing_methods')->onDelete('cascade');  // Payment method
        //     $table->foreignId('payment_type_id')->constrained('payment_types')->onDelete('restrict');  // Reference to payment type
        //     $table->string('payment_id')->nullable();  // Unique identifier for the payment method (bank, card, etc.)
        //     $table->date('payment_date');  // When the payment was made
        //     $table->timestamps();
        // });
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billing_id')->constrained('billings')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->date('billing_month');
            $table->foreignId('payment_method_id')->constrained('billing_methods')->onDelete('cascade');
        
            // Ensuring the foreign key column matches the primary key type in the referenced table
            $table->unsignedBigInteger('payment_type_id');  // Match the type of payment_types.id
            $table->foreign('payment_type_id')->references('id')->on('payment_types')->onDelete('restrict');
        
            $table->string('payment_id')->nullable();
            $table->date('payment_date');
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
