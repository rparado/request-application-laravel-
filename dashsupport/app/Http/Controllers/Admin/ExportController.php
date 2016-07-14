<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserModel;
use DB;
use Excel;
use Input;

class ExportController extends Controller
{
    public function downloadExcel($type)
    {
    	//$o_book = Book::select('id', 'isbn', 'title', 'author', 'publisher', 'description' )->get();
    	$data = UserModel::select('id', 'user_number', 'first_name', 'last_name', 'dept_id', 'user_type','active','created_at', 'updated_at')->get()->toArray();
		return Excel::create('User Details', function($excel) use ($data) {
			$excel->sheet('User Details', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
    }
    
}
