<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_text_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('question_id')->unsigned()->nullable();
            $table->string('option');
            $table->tinyInteger('correct')->unsigned()->nullable();
            $table->timestamps();

            $table->index('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
