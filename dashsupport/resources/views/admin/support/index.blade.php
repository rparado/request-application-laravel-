@extends('admin/layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')

	@if(count($support_requested) > 0 )
	<div class="x_panel">
		<div class="x_title">
			<h3>Support Items</h3>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered clearfix jambo_table bulk_action" id="support-table">
				<thead>
					<tr>
						<th>Receive Number</th>
						<th>Date Received</th>
						<th>Due Date</th>
						<th>Department</th>
						<th>Service <br /> Requested</th>
						<th>Requester</th>
						<th>Priority</th>
						<th>Status</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tbody>

					@foreach($support_requested as $support_request)
					<?php
						$class='';
						if($support_request->priority == "urgent") $class="urgent alert-danger";
						elseif($support_request->priority == "high") $class="high alert-danger";
						elseif($support_request->priority == "medium") $class="medium alert-warning";
						else $class="low alert-info";
					?>
					<tr  class="<?php echo $class; ?>">
						<td><a href="{{route('admin.support.edit', $support_request->id)}}">{{$support_request->received_no}}</a></td>
						<td>
							{{$support_request->date_received}}
						</td>
						<td>
							{{$support_request->due_date}}
						</td>
						<td>
							{{$support_request->dept_name}}
						</td>
						<td>
							{{$support_request->service_item_name}}
						</td>
						<td>
							{{ucfirst($support_request->first_name)}} {{ucfirst($support_request->last_name)}}
						</td>
						
						<td>
							{{$support_request->priority}}
						</td>
						<td>
							{{$support_request->status}}
						</td>
						<td>{{$support_request->remarks}}</td>
						
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
	
	@else
		<p>No data Found</p>
	@endif
			
@endsection