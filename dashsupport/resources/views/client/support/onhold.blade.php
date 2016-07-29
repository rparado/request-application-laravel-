@extends('client/layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')

	@if(count($support_onhold) > 0 )
	<div class="x_panel">
		<div class="x_title">
			<h3>Support Closed Status</h3>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered clearfix jambo_table bulk_action" id="support-table">
				<thead>
					<tr>
						<th>Support Number</th>
						<th>Date Received</th>
						<th>Due Date</th>
						<th>Department</th>
						<th>Service <br /> Requested</th>
						<th>Requester</th>
						<th>Priority</th>
						<th>Support <br />Status</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tbody>

					@foreach($support_onhold as $support_onh)
					<tr>
						<td>{{$supporsupport_onht_ip->received_no}}</td>
						<td>
							{{$support_onh->date_received}}
						</td>
						<td>
							{{$support_onh->due_date}}
						</td>
						<td>
							{{$support_onh->dept_name}}
						</td>
						<td>
							{{$support_onh->service_item_name}}
						</td>
						<td>
							{{ucfirst($support_onh->first_name)}} {{ucfirst($support_onh->last_name)}}
						</td>
						
						<td>
							{{$support_onh->priority}}
						</td>
						<td>
							{{$support_onh->status}}
						</td>
						<td>{{$support_onh->remarks}}</td>
						
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
	
	@else
		<div class="x_panel">
		<div class="x_title">
			<h3>Support On Hold Status</h3>
		</div>
		<div class="x_content" style="text-align: center">
			<h2>You have 0 on hold support status as of the moment</h2>
		</div>
	</div>
	@endif
			
@endsection