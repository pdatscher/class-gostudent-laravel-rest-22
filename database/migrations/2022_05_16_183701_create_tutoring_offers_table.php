<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutoringOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoring_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('headline');
            $table->string('subject');
            $table->text('description')->nullable();
            //$table->integer('user_id')->default(1);

            $table->integer('user_id')->unsigned();
            //create database constraint
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            //$table->foreignId('user_id')->nullable()
            //    ->unique()->constrained()
            //    ->onDelete('cascade');
            //fk field for relations: model name lowercase + "_id"
            //unsigned immer bei incrementing verwenden
            /*$table->integer('user_id')->unsigned();

            //create database constraint
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');*/

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
        Schema::dropIfExists('tutoring_offers');
    }
}
