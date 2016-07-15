@extends('client.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	<div class="x_panel">
		<div class="x_title request-list clearfix">
			<div class="pull-left">
				<h3>Request Items</h3>
			</div>
			<div class="pull-right" style="line-height:46px;">
				<a style="margin-bottom: 0;" href="{{url('/client/request/index')}}" class="btn btn-md btn-success"><i class="fa fa-plus" aria-hidden="true"></i> New</a>
				<a  style="margin-bottom: 0;" class="btn btn-primary btn-close" href="{{ route('client.request.index') }}"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</a>
			</div>
			
		</div>
		<div class="x_content clearfix">
			
			@if(count($requests) > 0)
			
				<table class="jambo_table bulk_action table table-striped table-bordered" id="client-request-table">
					<thead>
						<tr>
							<th><input type="checkbox" id="check-all" class="flat"></th>
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
								<td>
									<input type="checkbox" class="flat" name="table_records">
								</td>
								<td><a href="{{route('client.request.edit', $request->id)}}">{{$request->request_no}}</a></td>
								<td>{{$request->date_requested}}</td>
								<td>{{$request->due_date}}</td>
								<td>{{$request->dept_name}}</td>
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