<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoafisicaemailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoafisicaemail', function(Blueprint $table){
            $table->increments('id');
            $table->integer('idPessoaFisica')->unsigned();
            $table->string('email',255);
            $table->timestamps();
        });

        Schema::table('pessoafisicaemail', function(Blueprint $table) {
           $table->foreign('idPessoaFisica')->references('id')->on('pessoafisica');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pessoafisicaemail');
    }



}
