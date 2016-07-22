<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClientRequest;
use Auth;
class DashboardController extends Controller
{
    public function index()
	{
		$id = Auth::user()->id;
		$request_submitted = ClientRequest::where(['status' => 'Submitted', 'user_id' => $id])->count();
		//$request_open = ClientRequest::where(['status' => 'Open', 'user_id' => $id])->count();
		return \View::make('client/dashboard/index', compact('request_submitted')); 
		//return view('client.dashboard.index', compact('request'));
	}
}
