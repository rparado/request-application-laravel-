<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\ClientRequest;
use App\User;
use App\DepartmentModel;
use App\ServiceItemModel;
use App\RecieveRequestModel;
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
		/*if (Auth::check()) {	
			if(Auth::user()->user_type == 'Admin') {
				return redirect()->intended('/admin/dashboard');
			}
		}
		$id = Auth::user()->id;
		$request_submitted = ClientRequest::where(['status' => 'Submitted', 'user_id' => $id])->count();
		$support = RecieveRequestModel::where(['status' => 'Closed', 'user_id' => $id])->count();
		return \View::make('client/dashboard/index', compact('request_submitted', 'cancelled_request', 'support')); */
    }
}
