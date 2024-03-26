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
        Schema::dropIfExists('articles');

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('base')->nullable();
            $table->text('material')->nullable();
            $table->text('comment')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::dropIfExists('posts');
    }
};
