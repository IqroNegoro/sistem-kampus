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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('nidn')->unique();
            $table->string('name');
            $table->string('birth_place');
            $table->date('birth');
            $table->string('address');
            $table->uuid('faculty_id')->references("id")->on("faculties")->onDelete("cascade");
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->string('photo')->nullable();
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};
