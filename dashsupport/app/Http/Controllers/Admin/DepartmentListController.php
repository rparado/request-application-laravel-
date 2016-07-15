<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DepartmentList;
use DB;
class DepartmentListController extends Controller
{
   	public function index()
	{
		
		$department = DepartmentList::lists('dept_name', 'id');
		$results = DB::table('users')->select('user_number')->orderBy('id', 'desc')->limit(1)->get();
		if(count($results) > 0) {
			foreach($results as $result) {
				if (count($result) > 0) {
					$result = explode('-', $result->user_number);
					$result_count =  (int)$result[1]+1;

				} else {
					$result_count = 1;

				}
			}
		}	
		return \View::make('admin/setting/user/index', compact('department', 'result_count'));
	}
	public function create()
	{
		$results = DB::table('users')->select('user_number')->orderBy('id', 'desc')->limit(1)->get();
		
		if(count($results) > 0) {
			foreach($results as $result) {
				if (count($result) > 0) {
					$result = explode('-', $result->user_number);
					$result_count =  (int)$result[1]+1;

				} else {
					$result_count = 1;

				}
			}
		}	
		return \View::make('admin/setting/user/index', compact('department', 'result_count'));
	}

	public function edit()
	{
		
	}
	public function update()
	{
		
	}
	public function destroy()
	{
		
	}
}
