@extends('layouts.dashboard')

@section('page_heading','Pessoas fisicas cadastradas no sistema')

@section('section')

	<div class="col-sm-12">
		
		<div class="col-sm-12">
		@section ('collapsible_panel_title', 'Registros')
		
		@section ('collapsible_panel_body')
		@foreach($pessoasFisicas as $valor)
		<?php
			$html = "<a href=". url("ver/pessoa/fisica/detalhes/$valor->id").">Detalhes</a>";
		?>
		@include('widgets.collapse', array('id'=>$valor->id, 'class'=>'primary', 'header'=> $valor->name, 'body'=>$html,'collapseIn'=>true))

		@endforeach
		
		@endsection
	
		@include('widgets.panel', array('header'=>true, 'as'=>'collapsible'))

	</div>
	
	

@stop