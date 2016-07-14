@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
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
                   {!! Form::open(['url' => 'register', 'method' => 'post', 'class' => 'register row']) !!}
                   	<div class="form-group col-xs-12">
                   		{!! Form::label('company_name', 'Company') !!}
                   		{!! Form::text('company_name', null, array('class' => 'form-control')) !!}
                   	</div>
                   	<div class="form-group col-md-12">
                   		{!! Form::label('email', 'Email') !!}
                   		{!! Form::text('email', null, array('class' => 'form-control')) !!}
                   	</div>
                   	<div class="form-group col-md-12">
                   		{!! Form::label('password', 'Password') !!}
                   		{!! Form::password('password', array('class' => 'form-control')) !!}
                   	</div>
                   	<div class="form-group col-md-12">
                   		{!! Form::label('password_cofirm', 'Confirm Password') !!}
                   		{!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                   	</div>
                   	<div class="form-group col-md-6">
                   		{!! Form::submit('Submit', array('class' => 'btn btn-success')) !!}
                   	</div>
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
