@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
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
                   {!! Form::open(['url' => 'login', 'method' => 'post', 'class' => 'loginform row']) !!}
                   		
                   		<div class="col-xs-12 form-group">
                   			{!! Form::label('company_email', 'Email') !!}
                   			{!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter email add')) !!}
                   		</div>
                   		<div class="col-xs-12 form-group">
                   			{!! Form::label('password', 'Password') !!}
                   			{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter password')) !!}
                   		</div>
                   		<div class="col-xs-12">
                   			{!! Form::submit('Login', ['class' => 'btn btn-success']) !!}
						</div>
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
