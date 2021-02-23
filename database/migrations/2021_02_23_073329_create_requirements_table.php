<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Kursus/speciality table foreig key
            $table->bigInteger('course_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('courses')
                ->onDelete('cascade');

            // Kursus/speciality table foreig key
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students')
                ->onDelete('cascade');

            $table->char('nimi', 255);
            $table->integer('maht', );
            $table->char('kirjeldus', 255);
            $table->char('esimenePaevKaasa', 255);
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
        Schema::dropIfExists('requirements');
    }
}
