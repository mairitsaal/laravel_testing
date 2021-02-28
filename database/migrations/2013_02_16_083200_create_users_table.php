<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('phone')->nullable();
            $table->string('usertype')->nullable();
            $table->string('email')->unique();
            $table->string('position', 255)->nullable();

            $table->bigInteger('base_unit_department_id')->unsigned()->nullable();
            $table->foreign('base_unit_department_id')->references('id')->on('base_unit_departments')
                ->onDelete('cascade');

            $table->bigInteger('course_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('courses')
                ->onDelete('cascade');

            //$table->bigInteger('practice_instructor_id')->nullable()->unsigned();
            //$table->foreign('practice_instructor_id')->references('id')->on('practice_instructors')->onDelete('cascade');

            //$table->bigInteger('school_instructor_id')->nullable()->unsigned();
            //$table->foreign('school_instructor_id')->references('id')->on('school_instructors')->onDelete('cascade');

            //$table->bigInteger('student_id')->nullable()->unsigned();
            //$table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');

    }
}
