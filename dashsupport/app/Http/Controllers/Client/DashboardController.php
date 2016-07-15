<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClientRequest;
class DashboardController extends Controller
{
    public function index()
	{
		$request = ClientRequest::count();
		return view('client.dashboard.index', compact('request'));
	}
}
