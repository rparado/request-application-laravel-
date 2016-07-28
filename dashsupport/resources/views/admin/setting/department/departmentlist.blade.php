@extends('admin.layouts.app')

{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')

	@if(count($departments) > 0 )
	<div class="x_panel">
		<div class="x_title clearfix">
			<div class="pull-left">
				<h3>Departments Data</h3>
			</div>
			
			<div class="pull-right" style="line-height:46px;">
				<a style="margin-bottom: 0;" href="{{url('/admin/setting/department/index')}}" class="btn btn-md btn-success"><i class="fa fa-plus" aria-hidden="true"></i> New</a>
			</div>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered clearfix jambo_table bulk_action" id="department-table">
				<thead>
					<tr>
						<!--<th><input type="checkbox" class="flat"></th>-->
						<th>Department Number</th>
						<th>Department Name</th>
						<th>Active</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>

					@foreach($departments as $department)
					<tr>
						<!--<td>
							{{ Form::checkbox('checkDept', $department->id, array('class' => 'flat')) }}
						</td>-->
						<td><a href="{{route('admin.setting.department.edit', $department->id)}}">{{$department->dept_no}}</a></td>
						
						<td>{{$department->dept_name}}</td>

						<td>{{$department->active}}</td>
						<td>
							{!! Form::open([
								'method'=>'DELETE', 
								'route' => ['admin.setting.department.destroy', $department->id]
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