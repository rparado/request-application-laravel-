@extends('admin/layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	<div class="x_panel">
		<div class="x_title">
			<h3>Update Support Request</h3>
		</div>
		<div class="x_content">
		@if(Session::has('support_update'))
			<div class="alert alert-success fade in"><span class="glyphicon glyphicon-ok"></span><em> {{ Session::get('support_update') }}</em><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
			</button></div>
		@endif
			{!! Form::model($request , ['method' => 'PATCH', 'class' => 'row', 'route' => ['admin.support.update', $request->id]]) !!}
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('date_received', 'Date Received') !!}
					{!! Form::text('date_received', null, array('class' => 'form-control', 'readonly', 'id' => 'request-due-date')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
				
					{!! Form::Label('requester', 'Requester') !!}
					<input type="text" name="requester" value="<?php echo ucfirst($support_request->first_name); ?> <?php echo ucfirst($support_request->last_name); ?>" class="form-control" readonly>
					<input type="hidden" name="user_id" value="<?php echo $support_request->id; ?>">

				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('service_requested', 'Service Requested') !!}
					{!! Form::text('service_item_id', $support_request->service_item_name, array('class' => 'form-control', 'readonly')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('priority', 'Priority') !!}
					{!! Form::text('priority', $support_request->priority, array('class' => 'form-control', 'readonly')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('due_date', 'Due Date') !!}
					{!! Form::text('due_date', $support_request->due_date, array('class' => 'form-control', 'readonly', 'id' => 'request-due-date')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('department', 'Department') !!}
					{!! Form::text('department', $support_request->dept_name, array('class' => 'form-control', 'readonly')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('description', 'Description') !!}
					{!! Form::textarea('description',$support_request->description, array('class' => 'form-control', 'readonly', 'cols' => 10, 'rows' => '5')) !!}
				</div>
				<div class="form-group col-xs-12 col-md-6">
					{!! Form::Label('status', 'Status') !!}
					{{ Form::select('status', [
					   'Open' => 'Open',
					   'In progress' => 'In Progress',
					   'On hold' => 'On Hold',
					   'Closed' => 'Closed'
					   ], null, array('class' => 'form-control')) 
					}}
				</div>
				<div class="form-group col-xs-12 col-md-12">
					{!! Form::Label('remarks', 'Remarks') !!}
					{!! Form::textarea('remarks',null, array('class' => 'form-control desc-field')) !!}
				</div>
				<div class="form-group col-xs-12">
					{!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection