<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\DepartmentModel;
use App\ServiceItemModel;
use App\ClientRequest;
use App\RecieveRequestModel;
use Carbon\Carbon;
use DB;
class DashboardController extends Controller
{

	public function index()
	{
		$title = 'Dashboard';
		$users = User::count();
		//$departments = DepartmentModel::count();
		$services = ServiceItemModel::count();
		//$request_sent = ClientRequest::count();
		$support_request = RecieveRequestModel::count();
		$support_request_close = DB::table('tbl_received_request')->where(['status' => 'Closed'])->count();
		$request_due_today = DB::table('tbl_request')->where(['due_date' => Carbon::now()->format('Y-m-d'), 'support_status' => 'Open'])->count();
		
		return view('admin.dashboard.index', compact('title','users', 'services', 'support_request', 'support_request_close', 'request_due_today'));
	}
}
