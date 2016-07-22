@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title')
@section('main')
	<div class="count-wrapper-main clearfix">
		<div class="col-md-2 col-sm-4 col-xs-6 users_count">
		  <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
		  <div class="count">{{$users}}</div>
<!--		  	<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 users_count">
		  <span class="count_top"><i class="fa fa-user"></i>Total Department</span>
		  <div class="count">{{$departments}}</div>
<!--		  	<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 users_count">
		  <span class="count_top"><i class="fa fa-user"></i>No. of services</span>
		  <div class="count">{{$services}}</div>
<!--		  	<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 users_count">
		  <span class="count_top"><i class="fa fa-user"></i>No. of request</span>
		  <div class="count">{{$request_sent}}</div>
<!--		  	<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 users_count">
		  <span class="count_top"><i class="fa fa-user"></i>Support</span>
		  <div class="count">{{$support_request}}</div>
<!--		  	<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
		</div>
	</div>
	
	<div class="x_panel">
		<div class="x_title">
			<h3>Dashboard</h3>
		</div>
		<div class="x_content">
			
		</div>
	</div>
    
@endsection