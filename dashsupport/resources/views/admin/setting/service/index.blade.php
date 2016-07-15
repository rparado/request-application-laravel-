@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	<div class="x_panel">
		<div class="x_title">
			<h3>Create Service Item</h3>
		</div>
		<div class="x_content">

			@if($errors->has())
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
			</button>
				<ul class="validation-result">
					@foreach($errors->all() as $error)
						<li>
							{{$error}}
						</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('service_message'))
				<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('service_message') !!}</em>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</div>
			@endif
			{!! Form::open(['url' => 'admin/setting/service', 'method' => 'post', 'class' => 'serviceform row']) !!}
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('service no', 'Service Item No') !!}
					{!! Form::text('service_number','Ser-'.sprintf('%1$010d', $result_count), array('class' => 'form-control', 'readonly')) !!}
				</div>

				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('service_item_name', 'Service Item Name') !!}
					{!! Form::text('service_item_name',null, array('class' => 'form-control', 'placeholder' => 'Enter Service Item Name')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('group', 'Group') !!}
					{!! Form::select('dept_id', $group, null, array('class' => 'form-control')) !!}	
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('rate', 'Rate') !!}
					{!! Form::text('rate',null, array('class' => 'form-control', 'placeholder' => 'Enter Rate')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6 user-status-wrapper">
					{!! Form::Label('Active', 'Active') !!}
					<ul class="option-wrapper">
						<li>{{ Form::radio('active', 'Yes', true) }} <span>Yes</span></li>
						<li>{{ Form::radio('active', 'No') }} <span>No</span</li>
					</ul>

				</div>
				<div class="form-group col-xs-12">
					{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
	
    
@endsection