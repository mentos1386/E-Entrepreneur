<?php namespace App\Http\Controllers\Dashboard;

use App\App;
use App\Helpers\Themes;
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

		$appearance = Themes::appearance();

		$active_theme = App::first()->theme;

		return view('dashboard.appearance.index', ['themes' => $themes, 'active_theme' => $active_theme, 'appearance' => $appearance]);
	}

}
