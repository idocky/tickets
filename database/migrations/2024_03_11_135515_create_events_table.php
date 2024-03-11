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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title_ua');
            $table->string('title_ru');
            $table->string('slug');
            $table->dateTime('date');
            $table->integer('price');
            $table->integer('duration')->nullable();
            $table->text('description_ua')->nullable();
            $table->text('description_ru')->nullable();
            $table->unsignedBigInteger('concerthall_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('concerthall_id')->references('id')->on('concerthalls');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
