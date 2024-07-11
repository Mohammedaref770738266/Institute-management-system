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
            $table->string('full_name_ar')->unique();
            $table->string('full_name_en')->unique();
            $table->string('address');
            $table->string('phone_number');
            $table->enum('gender',['Male','Female']);
            $table->string('birth_place');
            $table->date('birth_day');
            $table->string('parent_name');
            $table->string('relative');
            $table->string('parent_phone');
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
