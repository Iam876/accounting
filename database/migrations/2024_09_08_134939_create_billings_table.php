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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
    
            // Foreign keys
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('restrict');
    
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id')->references('id')->on('billing_methods')->onDelete('set null');
    
            // Billing month and year
            $table->date('billing_month'); // Represents the month this bill is for
    
            // Dynamic fields to handle balance and overdue amounts
            $table->decimal('total_amount', 10, 2);             // Total amount due (utility fees, rent, and other costs)
            $table->decimal('amount_paid', 10, 2)->default(0.00); // Tracks how much has been paid
            $table->decimal('balance_due', 10, 2);              // Remaining balance to be paid
    
            // Status fields
            $table->enum('payment_status', ['paid', 'unpaid', 'overdue', 'partially_paid'])->default('unpaid');
    
            // Payment tracking
            $table->string('payment_id')->nullable();           // Transaction ID or reference for payment tracking
            $table->boolean('completed_billing')->default(false); // Flag to indicate if this bill has been fully paid
    
            // Timestamps
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
