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
            $table->uuid('id')->primary();
            $table->integer('nim');
            $table->string('name');
            $table->string('birth_place');
            $table->date('birth');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('gender');
            $table->string('photo')->nullable();

            $table->uuid('study_id')->nullable()->references("id")->on("studies")->onDelete("cascade");
            $table->uuid('class_id')->nullable()->references("id")->on("class")->onDelete("cascade");
            
            $table->softDeletes();
            $table->timestamps();
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
