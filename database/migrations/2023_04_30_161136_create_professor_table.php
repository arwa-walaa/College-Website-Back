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
        Schema::create('professor', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('professorId');
            $table->string('professorName');
            $table->string('email');
            $table->string('address');
            $table->enum('gender', ['fmale', 'male']);
            $table->string('password');
            $table->string('phoneNumber');
            $table->string('nationalId');
            $table->string('departmentCode');
            $table->string('courseID');
            // $table->foreign('courseID')->references('courseID')->on('_course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professor');
    }
};
