<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClientRequest;
use Auth;
use DB;
class DashboardController extends Controller
{
    public function index()
	{
		$id = Auth::user()->id;
		$request_submitted = ClientRequest::where(['status' => 'Submitted', 'user_id' => $id])->count();
		$cancelled_request = DB::table('tbl_request')->where(['status' => 'Cancelled', 'user_id' => $id])->count();
		return view('client.dashboard.index', compact('request_submitted', 'cancelled_request')); 
	}
	
}
