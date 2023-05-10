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
        Schema::create('program_perferences', function (Blueprint $table) {
            $table->integer('studentId',100);
            $table->string('preference1',100);
            $table->string('preference2',100);
            $table->string('preference3',100);
            $table->string('preference4',100);
            $table->string('preference5',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_perferences');
    }
};
