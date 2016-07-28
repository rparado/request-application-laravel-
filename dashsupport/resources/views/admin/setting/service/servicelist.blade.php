@extends('admin.layouts.app')

{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	
	
	
	@if(count($services) > 0 )
	<div class="x_panel">
		<div class="x_title clearfix">
			<div class="pull-left">
				<h3>Service Items</h3>
			</div>
			
			<div class="pull-right" style="line-height:46px;">
				<a style="margin-bottom: 0;" href="{{url('/admin/setting/service/index')}}" class="btn btn-md btn-success"><i class="fa fa-plus" aria-hidden="true"></i> New</a>
			</div>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered clearfix jambo_table bulk_action" id="service-table">
				<thead>
					<tr>
						<th>Service Item Number</th>
						<th>Service Item Name</th>
						<th>Rate</th>
						<th>Active</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

					@foreach($services as $service)
					<tr>
						<td><a href="{{route('admin.setting.service.edit', $service->id)}}">{{$service->service_number}}</a></td>
						<td>
							{{$service->service_item_name}}
						</td>
						<td>
							{{$service->rate}}
						</td>
						<td>{{$service->active}}</td>
						<td>
							{!! Form::open([
								'method'=>'DELETE', 
								'route' => ['admin.setting.service.destroy', $service->id]
							])
							!!}
							{!! Form::submit('Delete',
								[
									'class' => 'btn btn-danger'
								]
							) !!}
							{!! Form::close() !!}
						</td>
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