<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_departments', function (Blueprint $table) {
            $table->bigIncrements('id');

            //$table->bigInteger('practice_unit_id')->unsigned();
            //$table->foreign('practice_unit_id')->references('id')->on('practice_units')
            //    ->onDelete('cascade');

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
        Schema::dropIfExists('practice_departments');
    }
}
