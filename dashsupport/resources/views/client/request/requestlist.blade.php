@extends('client.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	<div class="x_panel">
		<div class="x_title">
			<h3>Request Items</h3>
		</div>
		<div class="x_content">
			
			@if(count($requests) > 0)
				<table class="table table-striped table-bordered" id="client-request-table">
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
						@foreach($requests as $request)
							
							<tr>
								<td><a href="{{route('client.request.edit', $request->id)}}">{{$request->request_no}}</a></td>
								<td>{{$request->date_requested}}</td>
								<td>{{$request->due_date}}</td>
								<td>{{$request->dept_id}}</td>
								<td>{{$request->service_item_name}}</td>
								<td>{{$request->priority}}</td>
								<td>{{$request->status}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>
	</div>
@endsection