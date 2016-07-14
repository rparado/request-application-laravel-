<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\User;
use App\DepartmentModel;
use App\ServiceItemModel;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
		if (Auth::check()) {	
			if(Auth::user()->user_type == 'Admin') {
				return redirect()->intended('/admin/dashboard');
			}
		}
		return \View::make('client/dashboard/index');
    }
}
