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
        Schema::create('evaluation', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('contentRate');//To what extent was the content of the course good?
            $table->string('isRepeated');
            $table->string('isClear');
            $table->string('relevantToObjectives');//How relevant was the course content to the course objectives?
            $table->string('preparetionForFutureCourses');//How effectively did the course content prepare you for future courses or careers?
            $table->string('courseID');
            // $table->foreign('courseID')->references('courseID')->on('_course');

            $table->string('engagedStudents');//How well did the professor engage students during class?
            $table->string('conveiedMaterial');//How effectively did the professor convey the material covered in the course?
            $table->string('isClearAgenda');//Were the course expectations and grading criteria clearly communicated?
            $table->string('teacherEffectiveness');//How would you rate the professor's overall effectiveness as a teacher?
            $table->string('communicationSkills');//How would you rate the professor's communication skills?
            $table->string('professorId');
            // $table->foreign('professorId')->references('professorId')->on('professor');

            $table->string('TAengagedStudents');//How well did the professor engage students during class?
            $table->string('TAconveiedMaterial');//How effectively did the professor convey the material covered in the course?
            $table->string('TAisClearAgenda');//Were the course expectations and grading criteria clearly communicated?
            $table->string('TAteacherEffectiveness');//How would you rate the professor's overall effectiveness as a teacher?
            $table->string('TAcommunicationSkills');//How would you rate the professor's communication skills?
            $table->string('TAId');
            // $table->foreign('TAId')->references('TAId')->on('_t_a');
       

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation');
    }
};
