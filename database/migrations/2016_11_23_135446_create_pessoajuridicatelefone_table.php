<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoajuridicatelefoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoajuridicatelefone', function(Blueprint $table){
                          $table->increments('id');
                          $table->integer('idPessoaJuridica')->unsigned();
                          $table->string('telefone',255);
                          $table->timestamps();
                      });

                      Schema::table('pessoajuridicatelefone', function(Blueprint $table) {
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
       Schema::drop('pessoajuridicatelefone');
    }
}
