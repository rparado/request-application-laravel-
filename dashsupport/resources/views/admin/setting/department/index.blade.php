@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	<div class="x_panel">
		<div class="x_title">
			<h3>Create Department</h3>
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
			{!! Form::open(['url' => 'admin/setting/department', 'method' => 'post', 'class' => 'departmentform row']) !!}
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('Department number', 'Department number') !!}
					{!! Form::text('dept_no',null, array('class' => 'form-control', 'placeholder' => 'Enter Department Number')) !!}
				</div>

				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('Department name', 'Department name') !!}
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
					{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
	
    
@endsection