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
        Schema::create('cofee', function (Blueprint $table) {
            $table->id();
            $table->string('base');
            $table->string('flavor');
            $table->integer('sweetness_level');
            $table->integer('bitterness_level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cofee');
    }
};
