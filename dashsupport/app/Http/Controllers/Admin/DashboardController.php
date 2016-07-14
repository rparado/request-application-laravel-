<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\DepartmentModel;
use App\ServiceItemModel;

class DashboardController extends Controller
{

	public function index()
	{
		$title = 'Dashboard';
		$users = User::count();
		$departments = DepartmentModel::count();
		$services = ServiceItemModel::count();
		return view('admin.dashboard.index', compact('title','users', 'departments', 'services'));
	}
}
