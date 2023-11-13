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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            // Kolom difficulty
            $table->string('difficulty'); 
            // Kolom question
            $table->string('question'); 
            // Kolom correct_answer
            $table->string('correct_answer'); 
            // Kolom incorrect_answers
            $table->string('incorrect_answer1'); 
            $table->string('incorrect_answer2'); 
            $table->string('incorrect_answer3'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
