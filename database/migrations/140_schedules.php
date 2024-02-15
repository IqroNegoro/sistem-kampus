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
        Schema::create('schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('day');
            $table->time('time');
            
            $table->uuid('studies_id')->nullable()->references("id")->on("studies")->onDelete("cascade");
            $table->uuid('year_id')->nullable()->references("id")->on("academic_years")->onDelete("cascade");
            $table->uuid('class_id')->nullable()->references("id")->on("class")->onDelete("cascade");
            $table->uuid('course_id')->nullable()->references("id")->on("courses")->onDelete("cascade");
            $table->uuid('lecturer_id')->nullable()->references("id")->on("lecturers")->onDelete("cascade");
            $table->uuid('room_id')->nullable()->references("id")->on("rooms")->onDelete("cascade");

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
