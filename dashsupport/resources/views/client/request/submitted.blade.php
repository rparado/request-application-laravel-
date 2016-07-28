@extends('client.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	<div class="x_panel">
		<div class="x_title request-list clearfix">
			<div class="pull-left">
				<h3>Submitted Request</h3>
			</div>
			
		</div>
		<div class="x_content clearfix">
			
			@if(count($submitted_requests) > 0)
			
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
						@foreach($submitted_requests as $submitted_request)
							
							<tr>
								<td>{{$submitted_request->request_no}}</td>
								<td>{{$submitted_request->date_requested}}</td>
								<td>{{$submitted_request->due_date}}</td>
								<td>{{$submitted_request->dept_name}}</td>
								<td>{{$submitted_request->service_item_name}}</td>
								<td>{{$submitted_request->priority}}</td>
								<td>{{$submitted_request->status}}</td>
								
							</tr>
						@endforeach
					</tbody>
				</table>
			@else 
			<div class="no-data-found">
				<h2>You have not yet submitted a request</h2>
			</div>	
			@endif
		</div>
	</div>
@endsection