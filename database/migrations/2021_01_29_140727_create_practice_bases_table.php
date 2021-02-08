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

            $table->increments('id');

            $table->char('nimi', 255);
            $table->string('lepinguNr');
            $table->integer('registriNr');
            $table->string('aadress');
            $table->integer('telefon');
            $table->string('email');
            $table->date('lepinguAlgus');
            $table->text('lepinguLopp'); // For indefinitely oportunitie
            $table->string('allkirjastaja');
            $table->text('tunniHind');
            $table->text('kontaktBaasis')-> nullable();
            $table->text('markused')-> nullable();
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
