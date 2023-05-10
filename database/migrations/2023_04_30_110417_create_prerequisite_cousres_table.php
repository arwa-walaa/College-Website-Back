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
        Schema::create('prerequisiteCousre', function (Blueprint $table) {
            $table->string('ID_COURSE',100);
            $table->string('ID_PREREQ_COURSE',100);

            // $table->foreign('ID_COURSE')
            // ->references('courseID')->on('course2s')->onDelete('cascade')->onUpdate('cascade');

            // $table->foreign('ID_PREREQ_COURSE')
            // ->references('courseID')->on('course2s')->onDelete('cascade')->onUpdate('cascade');

            // $table->primary(['ID_COURSE', 'ID_PREREQ_COURSE']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prerequisite_cousres');
    }
};
