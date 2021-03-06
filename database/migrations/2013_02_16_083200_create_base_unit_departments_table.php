<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseUnitDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_unit_departments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('practice_base_id')->nullable()->unsigned();
            $table->foreign('practice_base_id')->references('id')->on('practice_bases')->onDelete('cascade');

            $table->bigInteger('practice_unit_id')->nullable()->unsigned();
            $table->foreign('practice_unit_id')->references('id')->on('practice_units')->onDelete('cascade');

            $table->bigInteger('practice_department_id')->nullable()->unsigned();
            $table->foreign('practice_department_id')->references('id')->on('practice_departments')->onDelete('cascade');
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
        Schema::dropIfExists('base_unit_departments');
    }
}
