<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    protected $table = 'tbl_department';
	protected $guarded =  array('id');
	protected $fillable = [
		'dept_no',
		'dept_name',
		'active'
	];
}
