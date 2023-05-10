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
        Schema::create('course_reigesters', function (Blueprint $table) {
            $table->string('groupId',100);
            $table->string('courseid',100);
            $table->integer('studentId');
            $table->integer('grade');
            $table->integer('creditHours');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_reigesters');
    }
};
