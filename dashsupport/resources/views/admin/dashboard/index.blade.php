@extends('admin.layouts.app')
{{-- Web site Title --}}
@section('title')
@section('main')
	<div class="count-wrapper-main clearfix">
		<a href="{{url('admin/setting/user')}}" data-toggle="tooltip" data-placement="top" title="view users">
			<div class="col-md-2 col-sm-4 col-xs-6 users_count box-shadow">
				<div class="icon-wrapper">
					<i class="fa fa-user"></i>
				</div>
				<div class="count-details">
					<span class="count_top"> Users</span>
					<div class="count">{{$users}}</div>
				</div>

	<!--		  	<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
			</div>
		</a>
		<a href="{{url('admin/setting/department')}}" data-toggle="tooltip" data-placement="top" title="view departments">
			<div class="col-md-2 col-sm-4 col-xs-6 department_count box-shadow">
				<div class="icon-wrapper">
					<i class="fa fa-users"></i>
				</div>
				<div class="count-details">
					<span class="count_top">Departments</span>
					<div class="count">{{$departments}}</div>
				</div>

	<!--		  	<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
			</div>
		</a>
		<a href="{{url('admin/setting/service')}}" data-toggle="tooltip" data-placement="top" title="view services">
			<div class="col-md-2 col-sm-4 col-xs-6 services_count box-shadow">
				<div class="icon-wrapper">
					<i class="fa fa-tasks"></i>
				</div>
				<div class="count-details">
					<span class="count_top">Services</span>
					<div class="count">{{$services}}</div>
				</div>

	<!--		  	<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
			</div>
		</a>
		<a href="{{url('admin/support')}}"  data-toggle="tooltip" data-placement="top" title="view support">
		<div class="col-md-2 col-sm-4 col-xs-6 support_count box-shadow">
	   		<div class="icon-wrapper">
				<i class="fa fa-life-ring"></i>
			</div>
			<div class="count-details">
				<span class="count_top">Support</span>
				<div class="count">{{$support_request}}</div>
			</div>
		  
<!--		  	<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
		</div>
		</a>
		<div class="col-md-2 col-sm-4 col-xs-6 box-shadow closed_count">
	 		 <div class="icon-wrapper">
				<i class="fa fa-times"></i>
			</div>
			<div class="count-details">
				<span class="count_top">Closed Support</span>
				<div class="count">{{$support_request_close}}</div>
			</div>
		  
<!--		  	<span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
		</div>
	</div>
	
	<div class="x_panel">
		<div class="x_title">
			<h3>Dashboard</h3>
		</div>
		<div class="x_content">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Request and Support Activities</h3>
                  </div>
                 
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                  <div style="width: 100%;">
                   <div class="legend-wrapper">
                   	<span class="legend-request"></span> <span class="legend-label">Request</span>
                   	<span class="legend-support"></span> <span>Support</span>
                   </div>
                    <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;"></div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Top Request Resolved</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Personnel</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>PC</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Software Compliance</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Internet</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="clearfix"></div>
              </div>
            </div>
			</div>
		</div>
	</div>
    
@endsection