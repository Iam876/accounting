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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // URL of the image
            $table->string('mansion_name')->nullable();
            $table->text('mansion_address')->nullable();
            $table->string('pic_id')->nullable();
            // $table->string('contact')->nullable();
            // $table->string('prefecture')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};


// php artisan migrate --path="database/migrations/2024_09_08_130404_create_students_table.php"
// php artisan migrate:rollback --path="database/migrations/2024_09_08_113147_create_schools_table.php"
