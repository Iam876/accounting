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
            $table->string('nationality')->nullable();
            $table->unsignedBigInteger('school_id'); // Adjusted column type
            $table->date('contract_date')->nullable();
            $table->date('termination_date')->nullable();
            $table->text('remarks')->nullable();
            $table->string('student_image')->nullable(); // Image field
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('restrict');
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
