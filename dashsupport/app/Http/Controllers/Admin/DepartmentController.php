<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\DepartmentModel;

class DepartmentController extends Controller
{
	
    public function index()
	{
		$departments = DepartmentModel::all();
		return \View::make('admin/setting/department/departmentlist', compact('departments'));
		
	}
	public function create()
	{
		return \View::make('admin/setting/department/index', compact('departments'));
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
		    return redirect('admin/setting/department');
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
