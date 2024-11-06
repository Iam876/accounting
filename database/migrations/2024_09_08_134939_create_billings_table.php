<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('billings', function (Blueprint $table) {
            $table->id();
        
            // Foreign key to link to the student
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('restrict');
        
            // Billing month and total amount due (including rent, utility fees, etc.)
            $table->date('billing_month'); // Billing period (month and year)
            $table->decimal('total_amount', 10, 2); // Total amount for the billing period
            $table->decimal('amount_paid', 10, 2)->default(0);
            // Billing status
            $table->enum('payment_status', ['paid', 'unpaid', 'overdue', 'partially_paid'])->default('unpaid');
            $table->boolean('completed_billing')->default(false); // Flag for fully paid bills
        
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
