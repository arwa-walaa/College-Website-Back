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
        Schema::create('gp', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('idea');
            $table->string('requirements');

    
            // $table->string('member1Name');
            // $table->string('member2Name');
            // $table->string('member3Name');
            // $table->string('member4Name');
            // $table->string('member5Name');

            $table->string('member1');
            $table->string('member2');
            $table->string('member3');
            $table->string('member4');
            $table->string('member5');
            // $table->string('member6Name');

            // $table->string('member1ID');
            // $table->string('member2ID');
            // $table->string('member3ID');
            // $table->string('member4ID');
            // $table->string('member5ID');
            // $table->string('member6ID');

            // $table->string('member1Email');
            // $table->string('member2Email');
            // $table->string('member3Email');
            // $table->string('member4Email');
            // $table->string('member5Email');
            // $table->string('member6Email');
            $table->string('professor');
            $table->string('TA');

            

            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gp');
    }
};
