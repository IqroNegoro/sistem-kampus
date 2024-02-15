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
        Schema::create('css', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->uuid('schedule_id')->nullable()->references("id")->on("schedules")->onDelete("cascade");
            $table->uuid('year_id')->nullable()->references("id")->on("academic_years")->onDelete("cascade");
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('css');
    }
};
