<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTpenarandaDuckformFormSubmitResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpenaranda_duckform_form_submit_responses', function (Blueprint $table) {
            $table->mediumText('possible_answer_data')->nullable();
            $table->unsignedBigInteger('form_submit_id');
            $table->unsignedBigInteger('possible_answer_id');
            $table->foreign('form_submit_id', 'form_submit_responses_form_submit_id_foreign')->references('id')->on('tpenaranda_duckform_form_submits')->onDelete('cascade');
            $table->foreign('possible_answer_id', 'form_submit_responses_possible_answer_id_foreign')->references('id')->on('tpenaranda_duckform_possible_answers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tpenaranda_duckform_form_submit_responses');
    }
}
