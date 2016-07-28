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
use Mail;
use App\User;
use Session;
use Carbon\Carbon;
use DB;
use App\RecieveRequestModel;
class RequestController extends Controller
{
	public function __construct(ClientRequest $request, RecieveRequestModel $new_request)
	{
		$this->middleware('auth');
		$this->request = $request;
        $this->new_request = $new_request;
	}
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
		} else {
			if (count($results) < 0) {
				$result = explode('-', $results->request_no);
				$result_count =  (int)$results[1]+1;

			} else {
				$result_count = 1;

			}
		}
		
		return \View::make('client/request/index', compact('department', 'service_item', 'requests', 'result_count'));
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
			$request->status = "Submitted";
			$request->support_status = "Open";
			$request -> save();
			
			$request_id = $request->id;
			
			if($request->status == 'Submitted') {
				
				$request_received = DB::table('tbl_received_request')->select('received_no')->orderBy('id', 'desc')->limit(1)->get();
				if(count($request_received) > 0) {
					foreach($request_received as $request_receive) {
						if (count($request_receive) > 0) {
							$request_receive = explode('-', $request_receive->received_no);
							$result_count =  (int)$request_receive[1]+1;

						} else {
							$result_count = 1;
						}
					}
				} else {
					if (count($request_received) < 0) {
						$request_receive = explode('-', $request_receive->received_no);
						$result_count =  (int)$request_receive[1]+1;
					} else {
						$result_count = 1;
					}
				}
				$new_request = new RecieveRequestModel();
				$new_request->received_no = 'Supt-'.sprintf('%1$010d', $result_count);
				$new_request->date_received =  Carbon::now()->format('Y-m-d');
				$new_request->request_id = $request_id;
				$new_request->user_id = Auth::id();
				$new_request->status = 'Open';
				$request->request()->save($new_request);
				
				$user_id = Auth::user()->id;
				//$user = User::find($user_id)->toArray();
				
				$request_number = $request->request_no;
				
				
				$users = DB::table('users')
						->join('tbl_request', 'users.id', '=', 'tbl_request.user_id')
						->select('users.first_name', 'users.last_name', 'users.email','tbl_request.request_no')
						->where('users.id', $user_id)
						->get();
				foreach($users as $user) {
//				Mail::send('client.emails.mail', $user, function($message) use ($user) {
//					$message->to($user['email']);
//					$message->subject('Request Created');
//				});
				
					 Mail::send('client.emails.mail', ['user' => $user], function ($message) use ($user) {

						$message->to($user->email)->subject('Request Created');
					});
				}
				//dd('Mail sent');
			}
			
			Session::flash('flash_message', 'Request successfully submitted');
			Session::flash('mail_message', $request_number . ' has been created and is on queue right now.');
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
	public function destroy($id)
	{
	}
	public function getSubmittedRequests()
	{
		$id = Auth::user()->id;
		//$submitted_requests = ClientRequest::where(['status' => 'Submitted', 'user_id' => $id])->get();
		
		$submitted_requests = DB::table('tbl_request')
							->join('tbl_department', 'tbl_request.dept_id', '=', 'tbl_department.id')	
							->join('tbl_service_item', 'tbl_request.service_item_id', '=', 'tbl_service_item.id')
							->select('tbl_request.*', 'tbl_department.dept_name', 'tbl_service_item.service_item_name')
							->where(['status' => 'Submitted', 'user_id' => $id])
							->get();
		return \View::make('client/request/submitted', compact('submitted_requests'));				
	}

}
