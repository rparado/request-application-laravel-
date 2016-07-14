<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DepartmentList;
class DepartmentListController extends Controller
{
   	public function index()
	{
		$department = DepartmentList::lists('dept_name', 'id');
		return \View::make('admin/setting/user/index', compact('department'));
	}
	public function create()
	{
		return \View::make('admin/setting/user/index', compact('department'));
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
