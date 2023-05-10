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
        Schema::create('course_evaluation', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            $table->string('contentRate');//To what extent was the content of the course good?
            $table->string('isRepeated');
            $table->string('isClear');
            $table->string('relevantToObjectives');//How relevant was the course content to the course objectives?
            $table->string('preparetionForFutureCourses');//How effectively did the course content prepare you for future courses or careers?
            $table->string('courseID');
            // $table->foreign('courseID')->references('courseID')->on('_course');
       

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_evaluation');
    }
};
