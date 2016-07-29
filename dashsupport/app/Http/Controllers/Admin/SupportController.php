<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RecieveRequestModel;
use App\User;
use Carbon\Carbon;
use Auth;
use DB;
use Session;
use Mail;
class SupportController extends Controller
{
    public function index()
	{
		//$support_requested = RecieveRequestModel::all();
		$support_requested = DB::table('tbl_received_request')
			->join('users', 'tbl_received_request.user_id', '=', 'users.id')
			->join('tbl_request', 'tbl_received_request.request_id', '=', 'tbl_request.id')
			->join('tbl_service_item', 'tbl_request.service_item_id', '=', 'tbl_service_item.id')
			->join('tbl_department', 'tbl_request.dept_id', '=', 'tbl_department.id')
			//->join('tbl_service_item', 'tbl_request.service_item_id,', '=', 'tbl_service_item.id')
			->select(
				'tbl_received_request.*', 
				'users.first_name', 
				'users.last_name', 
				'tbl_request.priority', 
				'tbl_request.due_date', 
				'tbl_department.dept_name',
				'tbl_service_item.service_item_name'
				)
			//->where('tbl_received_request.status', 'Open')
			->orderBy('received_no', 'ASC')
            ->get();
		return \View::make('admin/support/index', compact('support_requested'));
	}
	public function create()
	{
		
	}
	public function store()
	{
		
	}
	public function edit($id)
	{
		$request = RecieveRequestModel::find($id);
		$support_requested = DB::table('tbl_received_request')
			->join('users', 'tbl_received_request.user_id', '=', 'users.id')
			->join('tbl_request', 'tbl_received_request.request_id', '=', 'tbl_request.id')
			->join('tbl_service_item', 'tbl_request.service_item_id', '=', 'tbl_service_item.id')
			->join('tbl_department', 'tbl_request.dept_id', '=', 'tbl_department.id')
			->select(
				'tbl_received_request.*', 
				'users.id',
				'users.first_name', 
				'users.last_name', 
				'tbl_service_item.service_item_name',
				'tbl_request.priority',
				'tbl_request.due_date',
				'tbl_department.dept_name',
				'tbl_request.description'
			)
			->where('tbl_received_request.id', $id)
			->get();
		foreach($support_requested as $support_request)
		{
			return \View::make('admin/support/update', compact('request',  'support_request'));
		}
		
		return \View::make('admin/support/update', compact('request', 'support_request'));
	}
	public function update(Request $request, $id)
	{
		$supportUpdate = $request->all();
		$support = RecieveRequestModel::find($id);
		$support->update($supportUpdate);
		
		/*//for mail setup
		$request_number = $support->received_no;
		$users = DB::table('tbl_received_request')
				->join('users',  'tbl_received_request.user_id', '=', 'users.id')
				->select(
					'users.first_name', 
					'users.last_name', 
					'users.email',
					'tbl_received_request.received_no'
				)
				->where('tbl_received_request.user_id')
				->get();
		
		foreach($users as $user) {
			dd($user);
			 Mail::send('client.emails.supportmail', ['user' => $user], function ($message) use ($user) {
				$message->to($user->email)->subject('Support response to your request');
			});
		}
		*/
		Session::flash('support_update', 'Support number ' . $support->received_no .' has been updated!');
		return redirect()->back();
	}
	public function destroy()
	{
		
	}
	public function getDueDates()
	{
		//$support_requested = RecieveRequestModel::all();
		$support_requested = DB::table('tbl_received_request')
			->join('users', 'tbl_received_request.user_id', '=', 'users.id')
			->join('tbl_request', 'tbl_received_request.request_id', '=', 'tbl_request.id')
			->join('tbl_service_item', 'tbl_request.service_item_id', '=', 'tbl_service_item.id')
			->join('tbl_department', 'tbl_request.dept_id', '=', 'tbl_department.id')
			//->join('tbl_service_item', 'tbl_request.service_item_id,', '=', 'tbl_service_item.id')
			->select(
				'tbl_received_request.*', 
				'users.first_name', 
				'users.last_name', 
				'tbl_request.priority', 
				'tbl_request.due_date', 
				'tbl_department.dept_name',
				'tbl_service_item.service_item_name'
				)
			->where('tbl_request.due_date', Carbon::now()->format('Y-m-d'))
            ->get();
		return \View::make('admin/support/due-date', compact('support_requested'));
	}
	public function getClosedSupportItems()
	{
		$id = Auth::user()->id;
		$support_closed = DB::table('tbl_received_request')
			->join('users', 'tbl_received_request.user_id', '=', 'users.id')
			->join('tbl_request', 'tbl_received_request.request_id', '=', 'tbl_request.id')
			->join('tbl_service_item', 'tbl_request.service_item_id', '=', 'tbl_service_item.id')
			->join('tbl_department', 'tbl_request.dept_id', '=', 'tbl_department.id')
			//->join('tbl_service_item', 'tbl_request.service_item_id,', '=', 'tbl_service_item.id')
			->select(
				'tbl_received_request.*', 
				'users.first_name', 
				'users.last_name', 
				'tbl_request.priority', 
				'tbl_request.due_date', 
				'tbl_department.dept_name',
				'tbl_service_item.service_item_name'
				)
			->where(['tbl_received_request.status' => 'Closed', 'tbl_received_request.user_id' => $id])
            ->get();
		return \View::make('client/support/closed', compact('support_closed'));
	}
	public function getInProgressSupportItems()
	{
		$id = Auth::user()->id;
		$support_inprogress = DB::table('tbl_received_request')
			->join('users', 'tbl_received_request.user_id', '=', 'users.id')
			->join('tbl_request', 'tbl_received_request.request_id', '=', 'tbl_request.id')
			->join('tbl_service_item', 'tbl_request.service_item_id', '=', 'tbl_service_item.id')
			->join('tbl_department', 'tbl_request.dept_id', '=', 'tbl_department.id')
			//->join('tbl_service_item', 'tbl_request.service_item_id,', '=', 'tbl_service_item.id')
			->select(
				'tbl_received_request.*', 
				'users.first_name', 
				'users.last_name', 
				'tbl_request.priority', 
				'tbl_request.due_date', 
				'tbl_department.dept_name',
				'tbl_service_item.service_item_name'
				)
			->where(['tbl_received_request.status' => 'In progress', 'tbl_received_request.user_id' => $id])
            ->get();
		return \View::make('client/support/inprogress', compact('support_inprogress'));
	}
	public function getOnHoldSupportItems()
	{
		$id = Auth::user()->id;
		$support_onhold = DB::table('tbl_received_request')
			->join('users', 'tbl_received_request.user_id', '=', 'users.id')
			->join('tbl_request', 'tbl_received_request.request_id', '=', 'tbl_request.id')
			->join('tbl_service_item', 'tbl_request.service_item_id', '=', 'tbl_service_item.id')
			->join('tbl_department', 'tbl_request.dept_id', '=', 'tbl_department.id')
			//->join('tbl_service_item', 'tbl_request.service_item_id,', '=', 'tbl_service_item.id')
			->select(
				'tbl_received_request.*', 
				'users.first_name', 
				'users.last_name', 
				'tbl_request.priority', 
				'tbl_request.due_date', 
				'tbl_department.dept_name',
				'tbl_service_item.service_item_name'
				)
			->where(['tbl_received_request.status' => 'On hold', 'tbl_received_request.user_id' => $id])
            ->get();
		return \View::make('client/support/onhold', compact('support_onhold'));
	}
}
