@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
<div class="x_panel">
	<div class="x_title">
		<h3>Update Department</h3>
	</div>
	<div class="x_content">
		@if(Session::has('dept_mesage_update'))
			<div class="alert alert-success fade in"><span class="glyphicon glyphicon-ok"></span><em> {!! session('dept_mesage_update') !!}</em>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</div>
		@endif
		{!! Form::model($department, ['method' => 'PATCH', 'class' => 'row', 'route' => ['admin.setting.department.update', $department->id]]) !!}
		<div class="form-group col-xs-12 col-md-6">
			{!! Form::Label('Department Number', 'User Number') !!}
			{!! Form::text('dept_no', null, array('class' => 'form-control', 'disabled')) !!}
		</div>
		
		<div class="form-group col-xs-12 col-md-6">
			{!! Form::Label('Department Name', 'Department Name') !!}
			{!! Form::text('dept_name', null, array('class' => 'form-control', 'placeholder' => 'Enter department name')) !!}
		</div>
		<div class="form-group col-xs-12 col-md-6 user-status-wrapper">
			{!! Form::Label('Active', 'Active') !!}
			<ul class="option-wrapper">
				<li>{{ Form::radio('active', 'Yes', true) }} <span>Yes</span></li>
				<li>{{ Form::radio('active', 'No') }} <span>No</span</li>
			</ul>
			
		</div>
		<div class="form-group col-xs-12">
			{!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
		</div>
	{!! Form::close() !!}
	</div>
</div>
	
	
@endsection