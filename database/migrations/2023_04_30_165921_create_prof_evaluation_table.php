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
        Schema::create('prof_evaluation', function (Blueprint $table) {
             $table->id();
            // $table->timestamps();
            $table->string('engagedStudents');//How well did the professor engage students during class?
            $table->string('conveiedMaterial');//How effectively did the professor convey the material covered in the course?
            $table->string('isClearAgenda');//Were the course expectations and grading criteria clearly communicated?
            $table->string('teacherEffectiveness');//How would you rate the professor's overall effectiveness as a teacher?
            $table->string('communicationSkills');//How would you rate the professor's communication skills?
            $table->string('professorId');
            // $table->foreign('professorId')->references('professorId')->on('professor');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prof_evaluation');
    }
};
