@extends('layouts.dashboard')

@section('page_heading','Pessoas Jurídicas cadastradas no sistema')

@section('section')

	<div class="col-sm-12">
		
		<div class="col-sm-12">
		@section ('collapsible_panel_title', 'Registros')
		
		@section ('collapsible_panel_body')
		@foreach($pessoasJuridicas as $valor)
		<?php
			$html = "<a href=". url("ver/pessoa/juridica/detalhes/$valor->id").">Detalhes</a>
								<a href=".url("editar/pessoa/juridica/$valor->id"). ">Editar</a>";
		?>
		@include('widgets.collapse', array('id'=>$valor->id, 'class'=>'primary', 'header'=> $valor->name, 'body'=>$html,'collapseIn'=>true))

		@endforeach
		
		@endsection
	
		@include('widgets.panel', array('header'=>true, 'as'=>'collapsible'))

	</div>
	
	

@stop