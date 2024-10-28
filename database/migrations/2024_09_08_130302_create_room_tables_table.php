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
        Schema::create('room_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apartment_id');
            $table->string('room_number')->nullable();
            $table->string('room_type')->nullable();
            $table->decimal('initial_rent', 8, 2)->nullable(); // Store rent with decimal precision
            $table->integer('max_student')->nullable(); // Store the maximum number of students as an integer
            $table->json('facilities')->nullable(); // Store facilities as a JSON array if needed
            $table->timestamps();
            $table->softDeletes();
        
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_tables');
    }
};
