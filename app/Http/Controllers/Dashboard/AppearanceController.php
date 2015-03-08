<?php namespace App\Http\Controllers\Dashboard;

use App\App;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AppearanceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$allThemes = Storage::disk('theme')->directories('/');

		$themes = array();

		foreach ($allThemes as $theme)
		{

			if (Storage::disk('theme')->exists($theme . '/preview.png'))
			{
				$encode = base64_encode(Storage::disk('theme')->get($theme . '/preview.png'));
			} elseif (Storage::disk('theme')->exists($theme . '/preview.jpg'))
			{
				$encode = base64_encode(Storage::disk('theme')->get($theme . '/preview.jpg'));
			} else
			{
				$encode = '';
			}

			$themes[] =
				[
					'name'  => $theme,
					'img'   => 'data:image/png;base64,' . $encode,
				];
		}

		$active_theme = App::first()->theme;

		return view('dashboard.appearance.index', ['themes' => $themes, 'active_theme' => $active_theme]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
