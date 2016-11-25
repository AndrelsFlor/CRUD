<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PessoaFisica;
use App\pessoaFisicaEmail;
use App\PessoaFisicaTelefone;
use DB;

class pessoaFisicaController extends Controller
{
    public function insert(Request $require){
    	$pessoaFisica = new PessoaFisica();
    	$pessoaFisica->name = $require->nome;
       	$pessoaFisica->cpf = $require->cpf;
    	$pessoaFisica->save();

    }

    public function selectAll(){

    	$pessoasFisicas = DB::table('pessoafisica')->get();

    	return view('verPessoasFisicas',['pessoasFisicas' => $pessoasFisicas]);


    }

    public function showDetails($id){
        $pessoaFisica = DB::table('pessoafisica')->where('id','=',$id)->get();
        $emails = DB::table('pessoafisicaemail')->where('idPessoaFisica','=',$id)->get();
        $telefones = DB::table('pessoafisicatelefone')->where('idPessoaFisica','=',$id)->get();
        return view('detalhesPessoaFisica',['pessoaFisica'=> $pessoaFisica,'emails'=>$emails,'telefones'=>$telefones]);
    }

    public function insertEmail(Request $request){
        $pessoaFisicaEmail = new pessoaFisicaEmail();

        $pessoaFisicaEmail->idPessoaFisica = $request->idPessoa;
        $pessoaFisicaEmail->email = $request->email;

        $pessoaFisicaEmail->save();
    }

    public function insertTelefone(Request $request){
        
        $modelTelefone = new PessoaFisicaTelefone();

        $modelTelefone->idPessoaFisica = $request->idPessoaFisica;
        $modelTelefone->telefone = $request->telefone;

        $modelTelefone->save();

    }

    public function loadUpdate($id){

        $dadosPessoa = DB::table('pessoafisica')->where('id','=',$id)->get();

        return view('formUpdatePessoaFisica',['dados' => $dadosPessoa]);       

    }

    public function update(Request $request){

        DB::table('pessoafisica')->where('id','=',$request->idPessoaFisica)->update([
                'name' => $request->nome,
                'cpf' => $request->cpf
            ]);

    }

   public function deleteEmail($idEmail,$idPessoa){
          DB::table('pessoafisicaemail')->where('id','=',$idEmail)->delete();

          return self::showDetails($idPessoa);

      }

      public function deletePhone($idPhone,$idPessoa){

          DB::table('pessoafisicatelefone')->where('id','=',$idPhone)->delete();

           return self::showDetails($idPessoa);

      }

}
