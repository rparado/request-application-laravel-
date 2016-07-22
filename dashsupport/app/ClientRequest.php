<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class ClientRequest extends Eloquent
{
    protected $table = 'tbl_request';
	protected $guarded = array('id');
	protected $fillable = [
		'request_no',
		'date_requested',
		'user_id',
		'service_item_id',
		'rate',
		'priority',
		'due_date',
		'dept_id',
		'description',
		'status'
	];
	
	public function request()
	{
		return $this->hasOne('App\RecieveRequestModel', 'id');
	}
}
