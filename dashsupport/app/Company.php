<?php

namespace App;

use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Company extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
	use Authenticatable, Authorizable, CanResetPassword;
	
    protected $table = 'tbl_company';
	protected $guarded = array('id');
	
	protected $fillable = [
		'company_name',
		'email',
		'password',
		'password_confirmation',
		'remoember_token'
	];
	protected $hidden = ['password', 'password_confirmation', 'remember_token'];
}
