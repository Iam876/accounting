<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('payments', function (Blueprint $table) {
    //         $table->id();

    //         // Foreign keys
    //         $table->foreignId('billing_id')->constrained('billings')->onDelete('cascade'); // Links to the billing table
    //         $table->foreignId('student_id')->constrained('students')->onDelete('cascade'); // Links to the student table

    //         // Payment details
    //         $table->decimal('amount_paid', 10, 2); // The amount paid by the student
    //         $table->date('payment_date'); // Date of payment

    //         // Payment method and transaction tracking
    //         $table->foreignId('payment_method_id')->constrained('billing_methods')->onDelete('cascade'); // Payment method used
    //         $table->string('transaction_id')->nullable(); // Optional transaction ID for tracking

    //         $table->timestamps();
    //     });

    // }

    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
        
            // Foreign keys to link payment to billing and student
            $table->foreignId('billing_id')->constrained('billings')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
        
            // Payment details
            $table->decimal('amount_paid', 10, 2); // The amount paid by the student
            $table->date('payment_date'); // Date the payment was made
        
            // Payment method and transaction tracking
            $table->foreignId('payment_method_id')->constrained('billing_methods')->onDelete('cascade'); // Payment method used
            $table->string('transaction_id')->nullable(); // Optional transaction ID for tracking payments
        
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
