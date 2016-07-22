<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function dashboard()
	{
		return view('admin.dashboard.index');
	}
	public function request()
	{
		return view('admin.request.index');
	}
	public function user()
	{
		return view('admin.setting.user.index');
	}
	public function userlists()
	{
		return view('admin.setting.user.userlist.item');
	}
	public function department()
	{
		return \View::make('admin.setting.department.index');
	}
	public function service()
	{
		return \View::make('admin.setting.service.index');
	}
	public function adminSupport()
	{
		return \View::make('admin.support.index');
	}
	
	//client
	public function clientRequest()
	{
		return \View::make('client.request.index');
	}
	public function clientDashboard()
	{
		return view('client.dashboard.index');
	}
}
