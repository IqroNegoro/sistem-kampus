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
        Schema::create('grades', function (Blueprint $table) {
            $table->uuid("id")->primary();
            
            $table->uuid('css_id')->references("id")->on("css")->onDelete("cascade");
            $table->uuid('student_id')->references("id")->on("students")->onDelete("cascade");
            $table->uuid('schedule_id')->references("id")->on("schedules")->onDelete("cascade");
            $table->uuid('year_id')->references("id")->on("academic_years")->onDelete("cascade");
            $table->integer('presence')->nullable()->default(0);
            $table->integer('tasks')->nullable()->default(0);
            $table->integer('mid_test')->nullable()->default(0);
            $table->integer('final_test')->nullable()->default(0);
            $table->integer('final_grade')->nullable()->default(0);
            $table->string('alphabet_grade')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
