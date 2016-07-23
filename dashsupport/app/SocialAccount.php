<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = [
		'name',
		'email',
		'provider_user_id',
		'provider'
	];
}
