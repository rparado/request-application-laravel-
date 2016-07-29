@extends('client.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	<div class="x_panel">
		<div class="x_title request-list clearfix">
			<div class="pull-left">
				<h3>Cancelled Request</h3>
			</div>
			
		</div>
		<div class="x_content clearfix">
			
			@if(count($cancelled_requests) > 0)
			
				<table class="jambo_table bulk_action table table-striped table-bordered" id="client-request-table">
					<thead>
						<tr>
							<th>Request Number</th>
							<th>Request Date</th>
							<th>Due Date</th>
							<th>Department</th>
							<th>Service Requested</th>
							<th>Priority</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cancelled_requests as $cancelled_request)
							<tr>
								<td>{{$cancelled_request->request_no}}</td>
								<td>{{$cancelled_request->date_requested}}</td>
								<td>{{$cancelled_request->due_date}}</td>
								<td>{{$cancelled_request->dept_name}}</td>
								<td>{{$cancelled_request->service_item_name}}</td>
								<td>{{$cancelled_request->priority}}</td>
								<td>{{$cancelled_request->status}}</td>
								
							</tr>
						@endforeach
					</tbody>
				</table>
			@else 
			<div class="no-data-found">
				<h2>You have no cancelled request</h2>
			</div>	
			@endif
		</div>
	</div>
@endsection