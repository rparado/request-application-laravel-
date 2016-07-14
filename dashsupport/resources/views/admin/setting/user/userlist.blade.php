@extends('admin.layouts.app')

{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	
	
	
	@if(count($users) > 0 )
	<div class="x_panel">
		<div class="x_title">
			<h3>Users Data</h3>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered clearfix" id="users-table">
				<thead>
					<tr>
						<th>User No</th>
						<th>Photo</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email Add</th>
						<th>User type</th>
						<th>Active</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

					@foreach($users as $user)
					<tr>
						<td><a href="{{route('admin.setting.user.edit', $user->id)}}">{{$user->user_number}}</a></td>
						<td>
							 <img alt="{{$user->photo}}" src="{!!url('appfiles/users/'.$user->photo) !!}" width="30"/>
						</td>
						<td>{{$user->first_name}}</td>
						<td>{{$user->last_name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->user_type}}</td>
						<td>{{$user->active}}</td>
						<td>
						@if($user->user_type == 'Regular')
							{!! Form::open([
								'method'=>'DELETE', 
								'route' => ['admin.setting.user.destroy', $user->id]
							])
							!!}
							{!! Form::submit('Delete',
								[
									'class' => 'btn btn-danger'
								]
							) !!}
							{!! Form::close() !!}
						</td>
						@endif
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
	
	@else
		<h3>No data Found</h3>
	@endif
	
@endsection