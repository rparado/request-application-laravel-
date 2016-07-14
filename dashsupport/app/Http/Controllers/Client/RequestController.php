<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClientRequest;
use App\DepartmentList;
use App\DepartmentModel;
use App\ServiceItemModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use Carbon\Carbon;
use DB;

class RequestController extends Controller
{
    public function index()
	{
		$requests = ClientRequest::all();
		$departments = DepartmentModel::all();
		return \View::make('client/request/requestlist', compact('requests', 'departments'));
	}
	public function create()
	{
		$requests = ClientRequest::all();
		$service_item = [''=>''] + ServiceItemModel::lists('service_item_name', 'id')->all();
		$department = [''=>''] + DepartmentList::lists('dept_name', 'id')->all();
		return \View::make('client/request/index', compact('department', 'service_item', 'requests'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
			'request_no' => 'required',
			'service_item_id' => 'required',
			'rate' => 'required|numeric',
			'priority' => 'required|not_in:0',
			'due_date' => 'required',
			'dept_id' => 'required',
			'description' => 'required'
		]);
		
		$input['request_no'] = Input::get('request_no');
		$input['user_id'] = Input::get('user_id');
		$input['service_item_id'] = Input::get('service_item_id');
		$input['rate'] = Input::get('rate');
		$input['priority'] = Input::get('priority');
		$input['due_date'] = Input::get('due_date');
		$input['dept_id'] = Input::get('dept_id');
		$input['description'] = Input::get('description');
		
		$rules = array(
			'request_no' => 'unique:tbl_request,request_no',
			'user_id' => 'required:tbl_request,user_id',
			'service_item_id' => 'required:tbl_service_item,service_item_id',
			'rate' => 'required:tbl_request,rate',
			'priority' => 'required:tbl_request,priority',
			'due_date' => 'required:tbl_request, due_date',
			'dept_id' => 'required:tbl_department,dept_id',
			'description' => 'required:tbl_request,description',
		);
		$validator = Validator::make($input, $rules);
		 
		if ($validator->fails()) {
		   return redirect('client/request/index')->withInput()->withErrors($validator);
		} else {
			$request = new ClientRequest($request->all());
			$request -> user_id = Auth::id();
			$request->date_requested =  Carbon::now()->format('Y-m-d');
			$request->status = "Closed";
			$request->support_status = "Open";
			$request -> save();
			Session::flash('flash_message', 'Request successfully created!');
		    return redirect()->back();
		}
		
		
	}
	public function edit()
	{
		
	}
	public function update()
	{
		
	}
	public function delete()
	{
		
	}
	public function getLastInsertId()
	{
		$service_item = [''=>''] + ServiceItemModel::lists('service_item_name', 'id')->all();
		$department = [''=>''] + DepartmentList::lists('dept_name', 'id')->all();
		
		
		$sql = DB::table('tbl_request')->pluck('request_no');
        if (count($sql) > 0) {
            $sql = explode('-', $sql[0]);
			//dd($sql)->toArray();
            $sql_count =  (int)$sql[1]+1;
			//dd($sql_count);
			return \View::make('client/request/index', compact('sql_count', 'department', 'service_item'));
        } else {
			$sql_count = 1;
           return \View::make('client/request/index', compact('sql_count','department', 'service_item'));
        }
		
	}

}
