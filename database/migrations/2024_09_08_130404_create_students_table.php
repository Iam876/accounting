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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('name_katakana')->nullable();
            // $table->unsignedBigInteger('room_id')->nullable();
            $table->string('email')->unique(); // Email field
            $table->string('phone')->nullable(); // Phone field
            // $table->unsignedBigInteger('school_id'); // Adjusted column type for school selection
            $table->string('country')->nullable(); // Country field
            $table->unsignedBigInteger('package_id'); // Package type field
            $table->unsignedBigInteger('school_id')->nullable(); // Package type field
            $table->unsignedBigInteger('apartment_id')->nullable(); // Selected apartment
            $table->unsignedBigInteger('room_id')->nullable(); // Selected room
            $table->date('contract_date')->nullable();
            $table->date('termination_date')->nullable();
            $table->date('billing_date')->nullable();
            $table->longText('remarks')->nullable();
            $table->decimal('initial_fees', 10, 2)->nullable(); // Initial fees field
            $table->decimal('house_rent', 10, 2)->nullable(); // House rent field
            $table->decimal('utility_fees', 10, 2)->nullable(); // Utility fees field
            $table->string('student_image')->nullable(); // Image field for profile photo
            $table->string('zyro_front')->nullable(); // Image field for Zyro Front
            $table->string('zyro_back')->nullable(); // Image field for Zyro Back
            $table->string('passport_photo')->nullable(); // Image field for Passport
            $table->timestamps();
            $table->softDeletes();
        
            // Foreign key constraints
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('set null');
            $table->foreign('package_id')->references('id')->on('package')->onDelete('set null');
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('set null');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
