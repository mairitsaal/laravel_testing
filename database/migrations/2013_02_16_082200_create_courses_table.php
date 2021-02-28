<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nimi', 255);
            $table->integer('opilasteArv');

            // Kursus/speciality table foreig key
            $table->bigInteger('speciality_id')->unsigned()->nullable();
            $table->foreign('speciality_id')->references('id')->on('specialities')
                ->onDelete('cascade');

            // Practice reqruiments/nõuded table foreig key
            //$table->bigInteger('reqruiment_id')->unsigned()->nullable();
            //$table->foreign('reqruiment_id')->references('id')->on('reqruiments')
            //    ->onDelete('cascade');

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
        Schema::dropIfExists('courses');
    }
}
