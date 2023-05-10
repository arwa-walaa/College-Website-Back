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
        Schema::create('_office_hour_', function (Blueprint $table) {
            $table->id();
            $table->string('professorOrTAName');
            $table->string('Email');
            $table->string('Department');
            $table->string('Location');
            $table->time('OfficeHours');
            $table->string('Day');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_office_hour_');
    }
};
