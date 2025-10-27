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
        Schema::create('detailsdeductions', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueID');
            $table->string('Quarter');
            $table->string('PR_No');
            $table->string('Date');
            $table->string('Title');
            $table->integer('Amount');
            $table->string('Status')->nullable();
            $table->integer('Totaldeduction')->nullable();
            $table->timestamps();
        });
    }                                                                                                                                                                                                                                                       

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailsdeductions');
    }
};    
