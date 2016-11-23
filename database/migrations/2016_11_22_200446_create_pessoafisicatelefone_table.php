<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoafisicatelefoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoafisicatelefone',function(Blueprint $table){

            $table->increments('id');
            $table->integer('idPessoaFisica')->unsigned();
            $table->text('telefone',255);
            $table->timestamps();


        });

        Schema::table('pessoafisicatelefone',function(Blueprint $table){
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
       Schema::drop('pessoafisicatelefone');
    }
}
