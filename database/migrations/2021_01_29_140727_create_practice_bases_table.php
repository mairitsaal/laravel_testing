<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_bases', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->char('nimi', 100);
            $table->string('lepinguNr', 25);
           // $table->string('lepinguNr');
            $table->integer('registriNr');
            $table->string('aadress');
            $table->integer('telefon');
            $table->string('email', 25);
            $table->date('lepinguAlgus');
            $table->text('lepinguLopp'); // For indefinitely oportunitie
            $table->string('allkirjastaja', 50);
            $table->text('tunniHind');
            $table->text('kontaktBaasis')-> nullable();
            $table->text('markused')-> nullable();

            //$table->bigInteger('practiceUnit_id')->unsigned();
            //$table->foreign('practiceUnit_id')->references('id')->on('practice_units')
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
        Schema::dropIfExists('practice_bases');
    }
}
