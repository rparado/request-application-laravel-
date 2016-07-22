<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Eloquent;
class RecieveRequestModel extends Eloquent
{
    protected $table = 'tbl_received_request';
	protected $guarded = array('id');
	protected $fillable = [
		'recieved_no',
		'date_received',
		'request_id',
		'user_id',
		'status',
		'remarks'
	];
	public function new_request()
	{
		return $this->belongsTo('App\ClientRequest', 'id');
	}
	
}
