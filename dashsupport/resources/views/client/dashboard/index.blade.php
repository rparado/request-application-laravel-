@extends('client.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h2>Request Summary</h2>
					
				</div>
				<div class="x_content">
					
					<a href="{{url('admin/support')}}"  data-toggle="tooltip" data-placement="top" title="view support" class="animated flipInY">
						<div class="col-md-2 col-sm-4 col-xs-6 support_count box-shadow">
							<div class="icon-wrapper">
								<i class="fa fa-life-ring"></i>
							</div>
							<div class="count-details">
								<span class="count_top">Submitted</span>
								<div class="count">{{$request_submitted}}</div>
							</div>
						</div>
					</a>
					
					<div class="animated flipInY col-xs-12 col-md-6">
						<div class="tile-stats">
							<div class="count">{{}}</div>
							<h3>Open</h3>
						</div>
					</div>
					<div class="animated flipInY col-xs-12 col-md-6">
						<div class="tile-stats">
							<div class="count">179</div>
							<h3>Pending</h3>
						</div>
					</div>
					<div class="animated flipInY col-xs-12 col-md-6">
						<div class="tile-stats">
							<div class="count">179</div>
							<h3>Pending</h3>
						</div>
					</div>
					<div class="animated flipInY col-xs-12 col-md-6">
						<div class="tile-stats">
							<div class="count">179</div>
							<h3>Pending</h3>
						</div>
					</div>
					<div class="animated flipInY col-xs-12 col-md-6">
						<div class="tile-stats">
							<div class="count">179</div>
							<h3>Pending</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="x_panel">
				<div class="x_title">
					<h2>Orders</h2>
				</div>
				<div class="x_content">

				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Summary of charges</h2>
				</div>
				<div class="x_content">

				</div>
			</div>
		</div>
	</div>
	

@endsection