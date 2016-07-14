@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	<h3>Add New Request</h3>
   	@if($errors->has())
    <div class="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
	</button>
		<ul class="validation-result">
			@foreach($errors->all() as $error)
				<li>
					{{$error}}
				</li>
			@endforeach
		</ul>
	</div>
	@endif
@endsection
