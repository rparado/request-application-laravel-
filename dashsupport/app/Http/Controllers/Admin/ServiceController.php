<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\DepartmentList;
use App\ServiceItemModel;

class ServiceController extends Controller
{
    public function index()
	{
		$services = ServiceItemModel::all();
		return \View::make('admin/setting/service/servicelist', compact('services'));
	}
	public function create()
	{
		$group = DepartmentList::lists('dept_name', 'id')->all();
		return \View::make('admin/setting/service/index', compact('group'));
	}
	public function store(Request $request)
	{
		//make input validation
		$this->validate($request, [
			//'service_number' => 'required',
			'service_item_name' => 'required',
			'rate' => 'required|numeric',
			'active' => 'required'
		]);
		//$input['service_number'] = Input::get('service_number');
		$input['service_item_name'] = Input::get('service_item_name');
		$input['dept_id'] = Input::get('dept_id');
		$input['rate'] = Input::get('rate');
		$input['active'] = Input::get('active');
		
		//set rules
		$rules = array(
			//'service_number' => 'unique:tbl_service_item, service_number',
			'service_item_name' => 'required:tbl_service_item, service_item_name',
			'dept_id' => 'required:tbl_department,dept_id',
			'rate' => 'required:tbl_service_item, rate',
			'active' => 'required:tbl_service_item, active',
		);
		
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return redirect('admin/setting/service/index')->withInput()-withErrors($validator);
		} else {
			$service = $request->all();
			ServiceItemModel::create($service);
			return redirect('admin/setting/service');
		}
	}
	public function edit($id)
	{
		$group = DepartmentList::lists('dept_name', 'id');
		$service = ServiceItemModel::find($id);
		return \View::make('admin/setting/service/update', compact('service', 'group'));
	}
	public function update(Request $request, $id)
	{
		$service_update = $request->all();
		$service = ServiceItemModel::find($id);
		$service->update($service_update);
		return redirect('admin/setting/service');
	}
	public function destroy($id)
	{
		ServiceItemModel::find($id)->delete();
		return redirect('admin/setting/service/index');
	}
	
	/*public function getServiceItem(Request $request)
	{
		$data = $request->all();
		echo json_encode($data);
	}*/
}
