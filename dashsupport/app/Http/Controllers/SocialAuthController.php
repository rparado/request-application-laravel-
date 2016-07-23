<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Auth;
use App\SocialAccount;
class SocialAuthController extends Controller
{
	 use AuthenticatesAndRegistersUsers, ThrottlesLogins;
	protected $redirectPath = '/home';
	
	public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
     public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
		
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('welcome');
        }
 
        $authUser = $this->findOrCreateUser($user);
 
        Auth::login($authUser, true);
 
        return redirect('home');
    }
	private function findOrCreateUser($facebookUser)
    {
		
        $authUser = SocialAccount::where('facebook_id', $facebookUser->id)->first();
 
        if ($authUser){
            return $authUser;
        }
 
        return SocialAccount::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'avatar' => $facebookUser->avatar
        ]);
    }
}