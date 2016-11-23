@extends('layouts.dashboard')

@section('page_heading','Panels and Collapsibles')

@section('section')
	
	<div class="col-sm-12">
		@section ('collapsible_panel_title', 'Collapsible Panel Group')
		@section ('collapsible_panel_body')
		@include('widgets.collapse', array('id'=>'1', 'class'=>'primary', 'header'=> 'This is a header', 'body'=>'Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.','collapseIn'=>true))
		@include('widgets.collapse', array('id'=>'2', 'header'=> 'This is a header', 'body'=>'Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.'))
		@include('widgets.collapse', array('id'=>'3', 'class'=>'success', 'header'=> 'This is a header', 'body'=>'Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.'))
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'collapsible'))
	</div>
@stop

