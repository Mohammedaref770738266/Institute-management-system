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
            $table->string('first_name_ar');
            $table->string('middel_name_ar');
            $table->string('last_name_ar');
            $table->string('first_name_en');
            $table->string('middel_name_en');
            $table->string('last_name_en');
            $table->string('address');
            $table->bigInteger('phone_number');
            $table->enum('gender',['Male','Female']);
            $table->string('birth_place');
            $table->date('birth_day');
            $table->string('parent_name');
            $table->bigInteger('parent_phone');
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
