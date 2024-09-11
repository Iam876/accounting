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
            
            $table->unsignedBigInteger('apartment_id');
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('restrict');
            
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('package_chooses')->onDelete('restrict');
            
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id')->references('id')->on('billing_methods')->onDelete('set null');
            
            // Date fields
            $table->date('billing_start_month');
            $table->date('house_enroll_date')->nullable();
            $table->date('termination_date')->nullable();
            
            // Monetary fields
            $table->decimal('rent', 10, 2);
            $table->decimal('utility_fees', 10, 2)->nullable();
            $table->decimal('initial_costs', 10, 2)->nullable();
            
            // Collection dates (nullable)
            $table->date('initial_costs_collection_date')->nullable();  // Ensure this exists
            $table->date('rent_collection_date')->nullable();
            $table->date('utilities_collection_date')->nullable();
            $table->decimal('balance_due', 10, 2)->nullable();
            
            // Payment tracking
            $table->string('payment_id');
            $table->boolean('completed_billing')->default(false);
            
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
