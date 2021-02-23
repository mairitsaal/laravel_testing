<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_instructors', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Kursus/speciality table foreig key
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students')
                ->onDelete('cascade');

            $table->char('name', 255);
            $table->string('phone')->nullable();
            //$table->string('usertype')->nullable();
            $table->char('position', 100)->nullable();;
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
        Schema::dropIfExists('school_instructors');
    }
}
