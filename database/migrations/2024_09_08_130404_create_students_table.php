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
            $table->string('email')->unique(); // Email field
            $table->string('phone')->nullable(); // Phone field
            $table->string('country')->nullable(); // Country field
            $table->unsignedBigInteger('package_id')->nullable(); // Package type field
            $table->unsignedBigInteger('school_id')->nullable(); // School field
            $table->unsignedBigInteger('apartment_id')->nullable(); // Selected apartment
            $table->unsignedBigInteger('room_id')->nullable(); // Selected room
            $table->date('contract_date')->nullable();
            $table->date('termination_date')->nullable();
            $table->decimal('futon',10, 2)->nullable();
            $table->longText('remarks')->nullable(); // Remarks field
            $table->decimal('initial_fees', 10, 2)->nullable(); // Initial fees field
            $table->decimal('house_rent', 10, 2)->nullable(); // House rent field
            $table->decimal('utility_fees', 10, 2)->nullable(); // Utility fees field
            $table->string('student_image')->nullable(); // Profile photo
            $table->string('zyro_front')->nullable(); // Zyro Front image field
            $table->string('zyro_back')->nullable(); // Zyro Back image field
            $table->string('passport_photo')->nullable(); // Passport image field
        
            // Adding the contract_status field
            $table->enum('contract_status', ['active', 'cancelled'])->default('active');
        
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('school_id')->references('id')->on('schools')->onDelete('set null');
            $table->foreign('package_id')->references('id')->on('package_chooses')->onDelete('set null');
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('set null');
            // $table->foreign('room_id')->references('id')->on('rooms')->onDelete('set null');
            $table->foreign('room_id')->references('id')->on('room_tables')->onDelete('set null');

            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');

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
