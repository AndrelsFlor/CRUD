<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PessoaJuridica;
use App\PessoaJuridicaEmail;
use App\PessoaJuridicaTelefone;

use DB;

class PessoaJuridicaController extends Controller
{
    public function insert(Request $request){
    	$pessoaJuridica = new PessoaJuridica();

    	$pessoaJuridica->name = $request->nome;
    	$pessoaJuridica->commercialName = $request->nomeFantasia;
   
    	$pessoaJuridica->cnpj = $request->cnpj;
    	$pessoaJuridica->save();


    }

    public function selectAll(){
    	$pessoasJuridicas = DB::table('pessoajuridica')->get();

    	return view('verPessoaJuridica',['pessoasJuridicas' => $pessoasJuridicas]);
    }

    public function showDetails($id){
        $pessoa = DB::table('pessoajuridica')->where('id','=',$id)->get();;

        $emails = DB::table('pessoajuridicaemail')->where('idPessoaJuridica','=',$id)->get();

        $telefones = DB::table('pessoajuridicatelefone')->where('idPessoaJuridica','=',$id)->get();

        return view('verPessoaJuridicaDetalhes',['pessoaJuridica'=>$pessoa,'emails'=>$emails,'telefones'=>$telefones]);

    }

    public function insertEmail(Request $request){

        $values = new PessoaJuridicaEmail();

        $values->idPessoaJuridica = $request->idPessoaJuridica;
        $values->email = $request->email;

        $values->save();
    }

    public function insertTelefone(Request $request){

        $modelTelefone = new PessoaJuridicaTelefone();
        $modelTelefone->idPessoaJuridica = $request->idPessoaJuridica;
        $modelTelefone->telefone = $request->telefone;

        $modelTelefone->save();

    }

    public function loadUpdate($id){

        $dados = DB::table('pessoajuridica')->where('id','=',$id)->get();

        return view('formUpdatePessoaJuridica',['dados'=>$dados]);

    }

    public function update(Request $request){
        
        DB::table('pessoajuridica')->where('id','=',$request->idPessoaJuridica)->update([
                'name'              => $request->nome,
                
                'commercialName'    => $request->nomeFantasia,
                'cnpj'              => $request->cnpj
            ]);
    }

    public function deleteEmail($idEmail,$idPessoa){
        DB::table('pessoajuridicaemail')->where('id','=',$idEmail)->delete();

        return self::showDetails($idPessoa);

    }

    public function deletePhone($idPhone,$idPessoa){

        DB::table('pessoajuridicatelefone')->where('id','=',$idPhone)->delete();

         return self::showDetails($idPessoa);

    }
}
