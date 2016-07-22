<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title') Administration</title>
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/summernote.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
	</head>
	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
			@include('admin.partials.sidebar')
			<div class="top_nav">
			  <div class="nav_menu">
				<nav class="" role="navigation">
				  <div class="nav toggle">
					<a id="menu_toggle"><i class="fa fa-bars"></i></a>
				  </div>
				  <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
						
                        <li class="dropdown">
                            <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="/assets/images/user.png" alt="">Hello Admin, {{ ucfirst(Auth::user()->first_name)  }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                               	<li><a href="javascript:;"> Profile</a></li>
								<li>
									<a href="javascript:;">
									<span class="badge bg-red pull-right">50%</span>
									<span>Settings</span>
									</a>
								</li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
							<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-envelope-o"></i>
								<span class="badge bg-green">6</span>
							</a>
						</li>
                    @endif
                </ul>

				 </nav>
			  </div>
			</div>
			<div class="right_col">
 				@yield('main')
			</div>
			<footer>
			  <div class="pull-right">
				Copyright &copy; 2016 Dash Support v1.0 | Rolando Parado</a>
			  </div>
			  <div class="clearfix"></div>
			</footer>
		</div>
		</div>	
		
		<script src="{{asset('assets/js/jquery-1.12.3.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap.js')}}"></script>
		<script src="{{asset('assets/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('assets/js/icheck.min.js')}}"></script>
		<script src="{{asset('assets/js/summernote.js')}}"></script>
		<script src="{{asset('assets/js/script.js')}}"></script>
	</body>
</html>