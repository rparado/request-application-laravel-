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
use App\User;
use Session;
use Carbon\Carbon;
use DB;

class RequestController extends Controller
{
    public function index()
	{
		//$departments = DepartmentModel::with('dept_name');
		$id = Auth::user()->id;
		$requests = DB::table('tbl_request')
            ->join('tbl_department', 'tbl_request.dept_id', '=', 'tbl_department.id')	
			->join('tbl_service_item', 'tbl_request.service_item_id', '=', 'tbl_service_item.id')
			->select('tbl_request.*', 'tbl_department.dept_name', 'tbl_service_item.service_item_name')
			->where('tbl_request.user_id',$id)
            ->get();
		
			return \View::make('client/request/requestlist', compact('requests'));
		
	}
	public function create()
	{
		
		$service_item = [''=>''] + ServiceItemModel::lists('service_item_name', 'id')->all();
		$department = [''=>''] + DepartmentList::lists('dept_name', 'id')->all();
		$results = DB::table('tbl_request')->select('request_no')->orderBy('id', 'desc')->limit(1)->get();
		if(count($results) > 0) {
			foreach($results as $result) {
				if (count($result) > 0) {
					$result = explode('-', $result->request_no);
					$result_count =  (int)$result[1]+1;

				} else {
					$result_count = 1;

				}
			}
		}	
		
		return \View::make('client/request/index', compact('department', 'service_item', 'requests', 'result_count'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
			//'request_no' => 'required',
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
			//'request_no' => 'unique:tbl_request,request_no',
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
			Session::flash('flash_message', 'Request successfully submitted');
		    return redirect()->back();
		}
		
	}
	public function edit($id)
	{
		$request = ClientRequest::find($id);
		$service_item = [''=>''] + ServiceItemModel::lists('service_item_name', 'id')->all();
		$department = [''=>''] + DepartmentList::lists('dept_name', 'id')->all();

		return \View::make('client/request/update', compact('department', 'service_item', 'request'));
	}
	public function update(Request $request, $id)
	{
		$request_update = $request->all();
		$request = ClientRequest::find($id);
		$request->update($request_update);
		Session::flash('update_message', 'Request has been successfully update.');
		return redirect()->back();
	}
	public function delete()
	{
		
	}


}
