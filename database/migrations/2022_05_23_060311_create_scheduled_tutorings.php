<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduledTutorings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_tutorings', function (Blueprint $table) {
            //$table->id();

            $table->foreignId('user_id')
                ->unique()->constrained()
                ->onDelete('cascade');
            $table->foreignId('tutoring_offer_id')
                ->unique()->constrained()
                ->onDelete('cascade');
            $table->foreign('available_date_day')
                ->constrained()
                ->onDelete('cascade');
            $table->foreign('available_date_time')
                ->constrained()
                ->onDelete('cascade');
            $table->primary(['user_id','tutoring_offer_id']);

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
        Schema::dropIfExists('scheduled_tutorings');
    }
}
