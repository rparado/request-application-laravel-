@extends('client/layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')

	@if(count($support_inprogress) > 0 )
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

					@foreach($support_inprogress as $support_ip)
					<tr>
						<td>{{$support_ip->received_no}}</td>
						<td>
							{{$support_ip->date_received}}
						</td>
						<td>
							{{$support_ip->due_date}}
						</td>
						<td>
							{{$support_ip->dept_name}}
						</td>
						<td>
							{{$support_ip->service_item_name}}
						</td>
						<td>
							{{ucfirst($support_ip->first_name)}} {{ucfirst($support_ip->last_name)}}
						</td>
						
						<td>
							{{$support_ip->priority}}
						</td>
						<td>
							{{$support_ip->status}}
						</td>
						<td>{{$support_ip->remarks}}</td>
						
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
	
	@else
		<div class="x_panel">
		<div class="x_title">
			<h3>Support Closed Status</h3>
		</div>
		<div class="x_content" style="text-align: center">
			<h2>You have no closed support status as of the moment</h2>
		</div>
	</div>
	@endif
			
@endsection