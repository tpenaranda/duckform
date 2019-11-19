<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTpenarandaDuckformQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpenaranda_duckform_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('randomize_possible_answers')->default(false);
            $table->boolean('required')->default(true);
            $table->string('type');
            $table->text('text');
            $table->unsignedBigInteger('section_id');

            $table->foreign('section_id')->references('id')->on('tpenaranda_duckform_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tpenaranda_duckform_questions');
    }
}
