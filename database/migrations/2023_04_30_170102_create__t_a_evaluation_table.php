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
        Schema::create('_t_a_evaluation', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
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
        Schema::dropIfExists('_t_a_evaluation');
    }
};
