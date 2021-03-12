<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizz_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quizz_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('alternative_id')->nullable();
            $table->timestamps();

            $table->foreign('quizz_id')->references('id')->on('quizzs');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('alternative_id')->references('id')->on('alternatives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizz_questions', function(Blueprint $table) {
            $table->dropForeign('quizz_id');
            $table->dropForeign('question_id');
            $table->dropForeign('alternative_id');
        });
    }
}
