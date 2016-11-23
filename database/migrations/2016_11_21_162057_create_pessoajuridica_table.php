<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoajuridicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoajuridica',function(Blueprint $table){
                    $table->increments('id');
                    $table->string('name',255);
                    $table->string('commercialName',255);                    
                    $table->string('cnpj',255);
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
       Schema::drop('pessoajuridica');
    }
}
