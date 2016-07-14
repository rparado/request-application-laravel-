<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientRequest extends Model
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
		'description'
	];
	public function getDepartment()
	{
		return $this->belongsTo('App\DepartmentModel');
	}
}
