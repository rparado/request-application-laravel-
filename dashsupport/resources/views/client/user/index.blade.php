@extends('client.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
<div class="x_panel">
	<div class="x_title">
		<h3>Update Profile</h3>
	</div>
	<div class="x_content">
		@if(Session::has('profile_update'))
			<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('profile_update') !!}</em> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
			</button></div>
		@endif
		{!! Form::model($user_profile, ['method' => 'PATCH', 'class' => 'row', 'route' => ['client.user.profileupdate', $user_profile->id]]) !!}
		<div class="form-group col-xs-12 col-md-6">
			{!! Form::Label('User Number', 'User Number') !!}
			{!! Form::text('user_number', null, array('class' => 'form-control', 'placeholder' => 'Enter User Number', 'disabled')) !!}
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
			{!! Form::Label('Email Add', 'Email Add') !!}
			{!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter email add')) !!}
		</div>
		<div class="col-xs-12 row">
			<h3 class="col-xs-12">Change Password</h3>
			<div class="form-group col-xs-12 col-md-6">
			{!! Form::Label('Password', 'Password') !!}
			{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter password')) !!}
		</div>
		<div class="form-group col-xs-12 col-md-6">
			{!! Form::Label('Confirm Password', 'Confirm Password') !!}
			{!! Form::password('password_confirm', array('class' => 'form-control', 'placeholder' => 'Enter password')) !!}
		</div>
		</div>
		<div class="form-group col-xs-12">
			{!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
		</div>
	{!! Form::close() !!}
	</div>
</div>
	
	
@endsection