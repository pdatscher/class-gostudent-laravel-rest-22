<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('title');
            //1:n relation anlegen
            /*
            $table->bigInteger("tutoring_offers_id")->unsigned();

            //create constraint - image wird bei löschen von tutoring offer gelöscht
            $table->foreign('tutoring_offers_id')
                ->references('id')->on('tutoring_offers')
                ->onDelete('cascade');
*/
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
        Schema::dropIfExists('images');
    }
}
