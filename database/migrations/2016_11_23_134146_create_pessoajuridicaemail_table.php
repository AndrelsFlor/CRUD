<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoajuridicaemailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('pessoajuridicaemail', function(Blueprint $table){
                  $table->increments('id');
                  $table->integer('idPessoaJuridica')->unsigned();
                  $table->string('email',255);
                  $table->timestamps();
              });

              Schema::table('pessoajuridicaemail', function(Blueprint $table) {
                 $table->foreign('idPessoaJuridica')->references('id')->on('pessoajuridica');
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pessoajuridicaemail');
    }
}
