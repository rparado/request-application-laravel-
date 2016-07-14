<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceItemModel extends Model
{
    protected $table = 'tbl_service_item';
	protected $guarded = array('id');
	protected $fillable = [
		'service_number',
		'service_item_name',
		'dept_id',
		'rate',
		'active'
	];
}
