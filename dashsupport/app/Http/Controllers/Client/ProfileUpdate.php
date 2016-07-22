<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Auth;
use Session;
class ProfileUpdate extends Controller
{
    public function index()
	{
		$id = Auth::user()->id;
		$user_profiles = DB::table('users')
				->select('users.*')
				->where('users.id', $id)
				->get();
		foreach($user_profiles as $user_profile) {
			//dd($user_profile);
			return \View::make('client/user/index', compact('user_profile'));
		}
	}
	public function create()
	{
		
	}	
	public function store()
	{
		
	}
	public function edit()
	{
		
	}
	public function update(Request $request, $id)
	{
		$userUpdate = $request->all();
		$user = User::find($id);
		$user->update($userUpdate);
		Session::flash('profile_update', 'Your profile has been successfully updated!');
		return redirect()->back();
	}
	public function destroy()
	{
		
	}
}
