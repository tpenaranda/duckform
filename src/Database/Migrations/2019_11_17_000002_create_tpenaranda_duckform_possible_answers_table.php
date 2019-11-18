<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTpenarandaDuckformPossibleAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpenaranda_duckform_possible_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->unsignedBigInteger('question_id');

            $table->foreign('question_id')->references('id')->on('tpenaranda_duckform_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tpenaranda_duckform_possible_answers');
    }
}
