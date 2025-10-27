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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->integer('categoryid');
            $table->string('name')->nullable();;
            $table->string('process')->nullable();; 
            $table->string('PPA')->nullable();; 
            $table->string('AIPRefCode')->nullable();; 
            $table->integer('FIRST')->nullable();
            $table->integer('THIRD')->nullable();
            $table->integer('SECOND')->nullable();   
            $table->integer('FOURTH')->nullable();
            $table->integer('FIRSTREM')->nullable();
            $table->integer('THIRDREM')->nullable();
            $table->integer('SECONDREM')->nullable();   
            $table->integer('FOURTHREM')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
