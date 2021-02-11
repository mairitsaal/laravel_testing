<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysBaseUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('base_units', function (Blueprint $table) {
            $table->foreign('practice_base_id')->references('id')->on('practice_bases')->onDelete('cascade');
            $table->foreign('practice_unit_id')->references('id')->on('practice_units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('base_units', function (Blueprint $table) {
        $table->dropForeignKey('base-units-practice-base-id-foreign');
        $table->dropForeignKey('base-units-practice-unit-id-foreign');

        });
    }
}
