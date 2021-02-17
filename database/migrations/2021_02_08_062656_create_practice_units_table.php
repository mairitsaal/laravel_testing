<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_units', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Practice base foreign key
            $table->bigInteger('practice_base_id')->unsigned();
            $table->foreign('practice_base_id')->references('id')->on('practice_bases')
                ->onDelete('cascade');

            // Instructor foreign key
            //$table->bigInteger('practice_instructor_id')->unsigned();
            //$table->foreign('practice_instructor_id')->references('id')->on('practice_instructors')
            //    ->onDelete('cascade');

            $table->char('nimi', 255);
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
        Schema::dropIfExists('practice_units');
    }
}
