<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\DepartmentModel;
use Session;
use DB;
class DepartmentController extends Controller
{
	
    public function index()
	{
		$departments = DepartmentModel::all();
		return \View::make('admin/setting/department/departmentlist', compact('departments'));
		
	}
	public function create()
	{
		$results = DB::table('tbl_department')->select('dept_no')->orderBy('id', 'desc')->limit(1)->get();
		if(count($results) > 0) {
			foreach($results as $result) {
				if (count($result) > 0) {
					$result = explode('-', $result->dept_no);
					$result_count =  (int)$result[1]+1;

				} else {
					$result_count = 1;

				}
			}
		}
		return \View::make('admin/setting/department/index', compact('departments', 'result_count'));
	}
	public function store(Request $request)
	{
		$this->validate($request, [
			'dept_name' => 'required',
		]);
		
		$input['dept_name'] = Input::get('dept_name');
		
		//set Rules for validation
		$rules = array(
			'dept_name' => 'required:tbl_department,dept_name'
		);
		
		$validator = Validator::make($input, $rules);
		 
		if ($validator->fails()) {
		   return redirect('admin/setting/department/index')->withInput()->withErrors($validator);
		} else {
			$department = $request->all();
			DepartmentModel::create($department);
			
			Session::flash('dept_mesage', 'Department successfully created');
		    return redirect()->back();
		}
	}
	public function edit($id)
	{
		$department = DepartmentModel::find($id);
		return \View::make('admin/setting/department/update', compact('department'));
	}

	public function update(Request $request, $id)
	{
		$department_update = $request->all();
		$department = DepartmentModel::find($id);
		$department->update($department_update);
		return redirect('admin/setting/department');
	}
	public function destroy($id)
	{
		DepartmentModel::find($id)->delete();
		return redirect('admin/setting/department');
	}
	public function geDepartmentItem(Request $request)
	{
		$data = $request->all();
		dd($data);
	}
}
