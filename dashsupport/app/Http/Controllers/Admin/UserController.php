<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\DepartmentList;
use App\User;
use Session;
use DB;

class UserController extends Controller
{
	
    public function index()
	{
		$users = User::all();
		return \View::make('admin/setting/user/userlist', compact('users'));
		
	}
	
	public function create()
	{
		$department = DepartmentList::lists('dept_name', 'id')->all();

		return \View::make('admin/setting/user/index', compact('department'));
		
	}
	
	public function store(Request $request)
	{
		$this->validate($request, [
			'user_number' => 'required',
			'photo' => 'max:300|mimes:jpg,png,gif',
			'first_name' => 'required|alpha_dash',
			'last_name' => 'required|alpha_dash',
			'email' => 'required|max:64|min:3|email|unique:users',
			'password' => 'required',
			'password_confirm' => 'required',
			'user_type' => 'required',
			'active' => 'required'
		]);
		
		$input['user_number'] = Input::get('user_number');
		$input['photo'] = Input::file('photo');
		$input['first_name'] = Input::get('first_name');
		$input['last_name'] = Input::get('last_name');
		$input['dept_id'] = Input::get('dept_id');
		$input['email'] = Input::get('email');
		$input['password'] = Input::get('password');
		$input['password_confirm'] = Input::get('password_confirm');
		$input['user_type'] = Input::get('user_type');
		$input['active'] = Input::get('active');
		
		//set Rules for validation
		$rules = array(
			'user_number' => 'unique:users,user_number',
			'photo'	=> 'required:users, photo',
			'first_name' => 'required:users,first_name',
			'last_name' => 'required:users,last_name',
			'dept_id' => 'required:tbl_department,dept_id',
			'email' => 'required:users,email',
			'password' => 'required:users,case_diff|numbers|letters|symbols',
			'password_confirm' => 'required:users,case_diff|numbers|letters|symbols',
			'user_type' => 'required:users,user_type',
			'active' => 'required:users,active'
		);
		
		$validator = Validator::make($input, $rules);
		
		if ($validator->fails()) {
		   return redirect('admin/setting/user/index')->withInput()->withErrors($validator);
		}
		else {

			$users = new User($request->except('photo', 'password', 'passsword_confirm'));
			//$users->id = Auth::id();
			$users->password = bcrypt($request->password);
        	$users->password_confirm = str_random(32);
			
			$picture = "";
			if ($request->hasFile('photo')) {
				$file = $request->file('photo');
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$picture = sha1($filename . time()) . '.' . $extension;
			}
			$users->photo = $picture;
			

			if ($request->hasFile('photo')) {
				$destinationPath = public_path() . '/appfiles/users/';
				$request->file('photo')->move($destinationPath, $picture);
			}

			$users->save();

    		Session::flash('flash_message','User successfully saved.');
		    return redirect()->back();
		}
	}
	public function edit($id)
	{
		$department = DepartmentList::lists('dept_name', 'id');
		$user = User::find($id);
		return \View::make('admin/setting/user/update', compact('user', 'department'));
	}
	public function update(Request $request, $id)
	{
		$userUpdate = $request->all();
		$user = User::find($id);
		$user->update($userUpdate);
		return redirect('admin/setting/user');
	}
	public function destroy($id)
	{
		User::find($id)->delete();
		return redirect('admin/setting/user');
	}
	
	public function getLastInsertedUserNumber()
	{
		$user_number = DB::table('users')->select(DB::raw('user_number'))->orderBy('id', 'desc')->limit(1)->get();
		dd($user_number);
		if (count($user_number) > 0) {
            $user_number = explode('-', $user_number[0]['user_no']);
            return (int) $user_number[1] + 1;
        } else {
            return 1;
        }
	}
}
