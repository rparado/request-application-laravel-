@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	<div class="x_panel">
		<div class="x_title">
			<h3>Create User</h3>
		</div>
		<div class="x_content">
				@if($errors->has())
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="close">&times;
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
			@if(Session::has('flash_message'))
				<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
			@endif
			{!! Form::open(['url' => 'admin/setting/user', 'method' => 'post', 'class' => 'userform row','files'=>true]) !!}
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('User Number', 'User Number') !!}
					{!! Form::text('user_number', 'Us-'.sprintf('%1$010d', $result_count), array('class' => 'form-control', 'placeholder' => 'Enter User Number', 'id' => 'usernum', 'readonly')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6" style="height: 58px">
					{!! Form::label('Upload Photo','Upload Photo') !!}
					{!! Form::file('photo') !!}
				</div>

				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('First Name', 'First Name') !!}
					{!! Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'Enter first name')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('Last Name', 'Last Name') !!}
					{!! Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Enter last name')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('Department', 'Department') !!}
					{!! Form::select('dept_id', $department, null, array('class' => 'form-control')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('Email Add', 'Email Add') !!}
					{!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter email add')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('Password', 'Password') !!}
					{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter password')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('Confirm Password', 'Confirm Password') !!}
					{!! Form::password('password_confirm', array('class' => 'form-control', 'placeholder' => 'Enter password')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('User Type', 'User Type') !!}
					<ul class="option-wrapper">
						<li>{{ Form::radio('user_type', 'Admin', true) }} <span>Admin</span></li>
						<li>{{ Form::radio('user_type', 'Regular') }} <span>Regular</span</li>
					</ul>
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