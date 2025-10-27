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
        Schema::create('newcategs', function (Blueprint $table) {
            $table->id();
            $table->string('CATEGORY');
            $table->string('AIPRefCode');
            $table->string('PPA');
            $table->string('RESOURCES');
            $table->string('RESPONSIBLE_UNIT');
            $table->string('ACCOUNT_CODE');
            $table->string('OBJECT_EXPENDITURE');
            $table->string('SOURCE_FUND');
            $table->string('NOTE')->nullable();
            $table->integer('FIRST')->nullable();
            $table->integer('FIRSTREM')->nullable();
            $table->integer('SECOND')->nullable();
            $table->integer('SECONDREM')->nullable();
            $table->integer('THIRD')->nullable();
            $table->integer('THIRDREM')->nullable();
            $table->integer('FOURTH')->nullable();
            $table->integer('FOURTHREM')->nullable();
            $table->integer('Year');
            $table->integer('REMAINING_BALANCE')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newcategs');
    }
};
