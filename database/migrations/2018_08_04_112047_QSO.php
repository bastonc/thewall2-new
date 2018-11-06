<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QSO extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('QSO', function (Blueprint $table) {
            $table->increments('id');
            $table->string('call');
            $table->string('operator');
            $table->string('qso_date');
            $table->string('band');
            $table->string('freq');
            $table->string('rst_sent');
            $table->string('tokenprogramm');
            $table->string('tokentuser');
            $table->string('programname');
            $table->timestamps();
        });
    }
  //call,operator,qso_date,dand,freq,rst_sent,tokenprogramm,tokentuser,programname
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
