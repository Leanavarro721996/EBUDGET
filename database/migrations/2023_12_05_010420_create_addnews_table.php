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
        Schema::create('addnews', function (Blueprint $table) {
            $table->id();
            $table->string('AIPRefCode');
            $table->string('ACCOUNT_CODE');
            $table->string('Title');
            $table->string('Department');
            $table->string('Year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addnews');
    }
};
