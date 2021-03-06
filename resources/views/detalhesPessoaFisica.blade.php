@foreach($pessoaFisica as $valor)
@extends('layouts.dashboard')
@section('page_heading',$valor->name)

@section('section')
@section ('collapsible_panel_title', 'Registros')

@section ('collapsible_panel_body')
<?php
	$id = $valor->id;
	$htmlEmail = array();
	$htmlTelefone = array();
	if(!empty($emails)){
		foreach($emails as $valorEmail){
			array_push($htmlEmail,"<a href='mailto:$valorEmail->email'>$valorEmail->email</a> <div class='btn-group-vertical pull-right'>
 
  <a href=".url('/deletar/pessoa/fisica/mail/'.$valorEmail->id.'/'.$valor->id).">Deletar</a>
 </div><br><br>");
		}
		$htmlEmail = implode($htmlEmail);
	}
	else{
		$htmlEmail = "Este usuário ainda não possue nenhum E-mail cadastrado";
	}
if(!empty($telefones)){
	foreach($telefones as $valorTelefones){
		array_push($htmlTelefone,$valorTelefones->telefone."<div class='btn-group-vertical pull-right'>
 
 <a href=".url('/deletar/pessoa/fisica/phone/'.$valorEmail->id.'/'.$valor->id).">Deletar</a>
 </div><br><br>");
	}
	$htmlTelefone = implode($htmlTelefone);
}
else{
	$htmlTelefone = "Este usuário ainda não possue nenhum Telefone cadastrado";
}
	
?>
@include('widgets.collapse', array('id'=>'collapseEmail', 'class'=>'primary', 'header'=> 'Email(s)', 'body'=>$htmlEmail."<br><a href=".url('ver/pessoa/fisica/detalhes/mail/'.$id).">Adicionar Email</a>",'collapseIn'=>true))

@include('widgets.collapse', array('id'=>'collapseTelefones', 'class'=>'primary', 'header'=> 'Telefone(s)', 'body'=>$htmlTelefone."<br><a href=".url('ver/pessoa/fisica/detalhes/phone/'.$id).">Adicionar Telefone</a>",'collapseIn'=>true))




@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'collapsible'))
           
            
@stop

@endforeach





