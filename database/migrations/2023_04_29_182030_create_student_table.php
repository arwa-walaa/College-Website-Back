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
        Schema::create('student', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('studentId');
            $table->string('studentName');
            $table->string('email');
            $table->string('password');
            $table->string('nationalId');
            $table->string('address');
            $table->string('gender');
            $table->string('level');
            $table->string('GPA');
            $table->string('departmentCode');
            $table->string('loginToken');
          


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
