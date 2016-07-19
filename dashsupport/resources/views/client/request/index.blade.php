@extends('client.layouts.app')
{{-- Web site Title --}}
@section('title')
@section('main')
	<div class="x_panel">
		<div class="x_title"><h3>Create Request</h3></div>
		<div class="x_content">
			@if($errors->has())
			<div class="alert alert-danger fade in">
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
			@if(Session::has('flash_message'))
				<div class="alert alert-success fade in"><span class="glyphicon glyphicon-ok"></span><em> {{ Session::get('flash_message') }}</em><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
			</button></div>
			@endif
			{!! Form::open(['url' => 'client/request', 'method' => 'post', 'class' => 'clientrequestform row', 'id' => 'clientrequest']) !!}
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('request no', 'Request Number') !!}
					{!! Form::text('request_no','Req-'.sprintf('%1$010d',$result_count), array('class' => 'form-control', 'readonly')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('date requested', 'Date Requested') !!}
					{!! Form::text('date_requested', Carbon\Carbon::today()->format('Y-m-d'), array('class' => 'form-control', 'disabled')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('requester', 'Requester') !!}
					<input type="text" class="form-control" name="requester" value="<?php echo Auth::user()->first_name; ?> <?php echo Auth::user()->last_name; ?>" disabled/>
					<input type="hidden" value="<?php echo Auth::user()->id; ?>" name="user_id">
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('service_item_id', 'Service Requested') !!}
					{!! Form::select('service_item_id', $service_item, null, array('class' => 'form-control')) !!}	
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('rate', 'Rate') !!}
					{!! Form::text('rate',null, array('class' => 'form-control')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('priority', 'Priority') !!}
					{{ Form::select('priority', [
					   'low' => 'Low',
					   'medium' => 'Medium',
					   'high' => 'High',
					   'urgent' => 'Urgent'
					   ], null, array('class' => 'form-control')) 
					}}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('due_date', 'Due date') !!}
					{!! Form::text('due_date',null, array('class' => 'form-control')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6" id="departmentList">
					{!! Form::Label('department', 'Department') !!}
					{!! Form::select('dept_id',$department, null, array('class' => 'form-control')) !!}
				</div>
				<div class="form-group col-xs-12" id="selectedDepartment">
					{!! Form::Label('description', 'Description') !!}
					{!! Form::textarea('description',null, array('class' => 'form-control desc-field')) !!}
				</div>
				<div class="form-group col-xs-12">
					{!! Form::submit('Submit', ['class' => 'btn btn-success', 'id' => 'submit-request']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection