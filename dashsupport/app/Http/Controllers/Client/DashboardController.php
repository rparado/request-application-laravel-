<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClientRequest;
use App\RecieveRequestModel;
use Auth;
class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{
		if (Auth::check()) {	
			if(Auth::user()->user_type == 'Admin') {
				return redirect()->intended('/admin/dashboard');
			}
		}
		$id = Auth::user()->id;
		$request_submitted = ClientRequest::where(['status' => 'Submitted', 'user_id' => $id])->count();
		$request_cancelled = ClientRequest::where(['status' => 'Cancelled', 'user_id' => $id])->count();
		$support_closed = RecieveRequestModel::where(['status' => 'Closed', 'user_id' => $id])->count();
		$support_onhold = RecieveRequestModel::where(['status' => 'On hold', 'user_id' => $id])->count();
		$support_ip = RecieveRequestModel::where(['status' => 'In progress', 'user_id' => $id])->count();
		return \View::make('client/dashboard/index', compact('request_submitted', 'request_cancelled', 'support_closed', 'support_onhold', 'support_ip')); 
	}
	
}
