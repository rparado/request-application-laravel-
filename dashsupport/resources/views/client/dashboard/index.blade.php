@extends('client.layouts.app')
{{-- Web site Title --}}
@section('title') :: @parent @endsection
@section('main')
<div class="count-wrapper-main clearfix">

	<a href="{{url('client/request/submitted')}}" data-toggle="tooltip" data-placement="top" title="view request submitted">
		<div class="col-md-2 col-sm-4 col-xs-6 support_count  box-shadow">
			<div class="icon-wrapper">
				<i class="fa fa-share"></i>
			</div>
			<div class="count-details">
				<span class="count_top">Submitted</span>
				<div class="count">{{$request_submitted}}</div>
			</div>
		</div>
	</a>
	<a href="{{url('client/request/cancelled')}}" data-toggle="tooltip" data-placement="top" title="view cancelled request">
		<div class="col-md-2 col-sm-4 col-xs-6 users_count  box-shadow">
			<div class="icon-wrapper">
				<i class="fa fa-user-times"></i>
			</div>
			<div class="count-details">
				<span class="count_top">Request Cancel</span>
				<div class="count">{{$request_cancelled}}</div>
			</div>
		</div>
	</a>
	<a href="{{url('client/support/closed')}}" data-toggle="tooltip" data-placement="top" title="view closed support">
		<div class="col-md-2 col-sm-4 col-xs-6 services_count  box-shadow">
			<div class="icon-wrapper">
				<i class="fa fa-eye-slash" aria-hidden="true"></i>
			</div>
			<div class="count-details">
				<span class="count_top">Closed Support</span>
				<div class="count">{{$support_closed}}</div>
			</div>
		</div>
	</a>
	<a href="{{url('client/support/inprogress')}}" data-toggle="tooltip" data-placement="top" title="view In Prorgess support">
		<div class="col-md-2 col-sm-4 col-xs-6 due_count  box-shadow">
			<div class="icon-wrapper">
				<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
			</div>
			<div class="count-details">
				<span class="count_top">IP Support</span>
				<div class="count">{{$support_ip}}</div>
			</div>
		</div>
	</a>
	<a href="{{url('client/support/onhold')}}" data-toggle="tooltip" data-placement="top" title="view On Hold support">
		<div class="col-md-2 col-sm-4 col-xs-6 closed_count  box-shadow">
			<div class="icon-wrapper">
				<i class="fa fa-hand-paper-o" aria-hidden="true"></i>
			</div>
			<div class="count-details">
				<span class="count_top">Hold Support</span>
				<div class="count">{{$support_onhold}}</div>
			</div>
		</div>
	</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Total Resolved Request</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="demo-container" style="height:280px">
                        <div id="placeholder33x" class="demo-placeholder"></div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div>
                        <div class="x_title">
                            <h2>Top Support Persons</h2>
                            <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                            <li class="media event">
                                <a class="pull-left border-aero profile_thumb">
                                    <i class="fa fa-user aero"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">Mr. Ian Cordero</a>
                                    <p>IT Operations </p>
                                    <p> <small>40 Supports Resolved</small>
                                    </p>
                                </div>
                            </li>
                           <li class="media event">
                                <a class="pull-left border-aero profile_thumb">
                                    <i class="fa fa-user aero"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">Ms. Jenelyn Contillo</a>
                                    <p>IT Operations </p>
                                    <p> <small>30 Supports Resolved</small>
                                    </p>
                                </div>
                            </li>
                           <li class="media event">
                                <a class="pull-left border-aero profile_thumb">
                                    <i class="fa fa-user aero"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">Ms. Mildred Evano</a>
                                    <p>IT Operations </p>
                                    <p> <small>50 Supports Resolved</small>
                                    </p>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection