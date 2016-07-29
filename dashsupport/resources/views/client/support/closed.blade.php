@extends('client/layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')

	@if(count($support_closed) > 0 )
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

					@foreach($support_closed as $support_close)
					<?php
						$class='';
						if($support_close->priority == "urgent") $class="urgent alert-danger";
						elseif($support_close->priority == "high") $class="high alert-danger";
						elseif($support_close->priority == "medium") $class="medium alert-warning";
						else $class="low alert-info";
					?>
					<tr  class="<?php echo $class; ?>">
						<td>{{$support_close->received_no}}</td>
						<td>
							{{$support_close->date_received}}
						</td>
						<td>
							{{$support_close->due_date}}
						</td>
						<td>
							{{$support_close->dept_name}}
						</td>
						<td>
							{{$support_close->service_item_name}}
						</td>
						<td>
							{{ucfirst($support_close->first_name)}} {{ucfirst($support_close->last_name)}}
						</td>
						
						<td>
							{{$support_close->priority}}
						</td>
						<td>
							{{$support_close->status}}
						</td>
						<td>{{$support_close->remarks}}</td>
						
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