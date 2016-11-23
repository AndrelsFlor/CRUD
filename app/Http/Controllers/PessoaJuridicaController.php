<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PessoaJuridica;

class PessoaJuridicaController extends Controller
{
    public function insert(Request $request){
    	$pessoaJuridica = new PessoaJuridica();

    	$pessoaJuridica->name = $request->nome;
    	$pessoaJuridica->commercialName = $request->nomeFantasia;
   
    	$pessoaJuridica->cnpj = $request->cnpj;
    	$pessoaJuridica->save();


    }
}
