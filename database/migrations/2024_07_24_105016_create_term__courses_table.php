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
        Schema::create('term__courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('term_id')->constrained('terms','id');
            $table->foreignId('course_id')->constrained('courses','id');
            $table->foreignId('teacher_id')->constrained('teachers','id');
            $table->foreignId('hall_id')->constrained('halls','id');
            $table->foreignId('period_id')->constrained('periods','id');
            $table->double('price');
            $table->integer('minimum_num');
            $table->integer('maxmum_num');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('term__courses');
    }
};
