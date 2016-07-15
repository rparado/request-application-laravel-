@extends('client.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
	<div class="row">
		<div class="col-md-6 col-md-4">
			<div class="x_panel">
				<div class="x_title">
					<h2>Request Summary</h2>
				</div>
				<div class="x_content">
					<div class="animated flipInY col-xs-12 col-md-6">
						<div class="tile-stats">
							<div class="count"></div>
							<h3>Submitted</h3>
						</div>
					</div>
					<div class="animated flipInY col-xs-12 col-md-6">
						<div class="tile-stats">
							<div class="count">179</div>
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
		<div class="col-md-6 col-md-4">
			<div class="x_panel">
				<div class="x_title">
					<h2>Orders</h2>
				</div>
				<div class="x_content">

				</div>
			</div>
		</div>
		<div class="col-md-6 col-md-4">
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