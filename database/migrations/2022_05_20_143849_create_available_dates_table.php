<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->date('day');
            $table->time('time');

            //fk field for relations: model name lowercase + "_id"
            //unsigned immer bei incrementing verwenden
            $table->integer('tutoring_offer_id')->unsigned();

            //create database constraint
            $table->foreign('tutoring_offer_id')
                ->references('id')->on('tutoring_offers')
                ->onDelete('cascade');

            $table->integer('user_id')->unsigned()->nullable();

            //create database constraint
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('available_dates');
    }
}
