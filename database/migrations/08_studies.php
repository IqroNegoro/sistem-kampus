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
        Schema::create('studies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('study_code');
            $table->string('name');
            $table->string('degree');
            
            $table->uuid("faculty_id")->nullable();
            $table->uuid("lecturer_id")->nullable()->references("id")->on("lecturers")->onDelete("cascade");

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studies');
    }
};
