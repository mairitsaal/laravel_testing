<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('practice_base_id')->unsigned();
            $table->bigInteger('practice_unit_id')->unsigned();;
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
        Schema::dropIfExists('base_units');
    }
}
