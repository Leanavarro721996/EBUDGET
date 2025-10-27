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
        Schema::create('addingdetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('uniqueID');
            $table->string('FIRSTadd')->nullable();
            $table->string('SECONDadd')->nullable();
            $table->string('THIRDadd')->nullable();
            $table->string('FOURTHadd')->nullable();
            $table->string('Date')->nullable();
           
        });
    }
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addingdetails');
    }
};
