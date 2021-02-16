<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_instructors', function (Blueprint $table) {
            $table->bigIncrements('id');

            //$table->bigInteger('practice_base_id')->unsigned();
            //$table->foreign('practice_base_id')->references('id')->on('practice_bases')
            //    ->onDelete('cascade');

            //$table->bigInteger('practice_unit_id')->unsigned();
            //$table->foreign('practice_unit_id')->references('id')->on('practice_units')
            //    ->onDelete('cascade');

            //$table->bigInteger('practice_department_id')->unsigned();
            //$table->foreign('practice_department_id')->references('id')->on('practice_departments')
            //->onDelete('cascade');

            $table->char('nimi', 255);
            $table->char('amet', 100);
            $table->string('email', 25);
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
        Schema::dropIfExists('practice_instructors');
    }
}
