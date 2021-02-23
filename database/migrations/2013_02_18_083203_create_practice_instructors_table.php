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

            // Practice base foreign key
            $table->bigInteger('practice_base_id')->unsigned()->nullable();
            $table->foreign('practice_base_id')->references('id')->on('practice_bases')
                ->onDelete('cascade');

            // Practice unit foreign key
            $table->bigInteger('practice_unit_id')->unsigned()->nullable();
            $table->foreign('practice_unit_id')->references('id')->on('practice_units')
                ->onDelete('cascade');

            // Practice department foreig key
            $table->bigInteger('practice_department_id')->unsigned()->nullable();
            $table->foreign('practice_department_id')->references('id')->on('practice_departments')
            ->onDelete('cascade');

            // Users table foreig key
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            // Users table foreig key
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('users')
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
        Schema::dropIfExists('practice_instructors');
    }
}
