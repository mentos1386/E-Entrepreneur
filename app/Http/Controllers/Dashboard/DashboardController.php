<?php namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {

	/**
	 * @return \Illuminate\View\View
     */
	public function index()
	{
		return view('dashboard.index');
	}

}