<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTpenarandaDuckformFormSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpenaranda_duckform_form_submits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('completed_at')->nullable();
            $table->string('reference_id')->nullable();

            $table->unsignedBigInteger('form_id');
            $table->foreign('form_id')->references('id')->on('tpenaranda_duckform_forms')->onDelete('cascade');

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
        Schema::dropIfExists('tpenaranda_duckform_form_submits');
    }
}
