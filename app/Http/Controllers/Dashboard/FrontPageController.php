<?php namespace App\Http\Controllers\Dashboard;

use App\App;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Themes;
use App\Page;
use App\Post;
use App\Themedata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FrontPageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $appearance = Themes::appearance();

        return view('dashboard.appearance.frontpage.index', ['appearance' => $appearance]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $name
     * @return Response
     */
    public function create($name)
    {

        $current_theme = App::first()->theme;

        $front_pages = Themes::appearance()['front_page'];

        foreach ($front_pages as $front_page)
        {
            foreach ($front_page['items'] as $item)
            {
                if ($item['name'] == $name)
                {
                    $dashboard = $item['dashboard'];
                }
            }
        }

        $view_path = 'themes.' . $current_theme . '.' . $dashboard;

        return view('dashboard.appearance.frontpage.create', ['name' => $name, 'view_path' => $view_path]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $json = json_encode($input['data']);

        if (isset($input['rewrite']))
        {
            if ($input['rewrite'])
            {
                $theme_data = Themedata::where('type', $input['type'])->first();
            }
            if (empty($theme_data))
            {
                $theme_data = new Themedata;
            }

        } else
        {
            $theme_data = new Themedata;
        }

        $theme_data->type = $input['type'];
        $theme_data->data = $json;
        $theme_data->save();

        return redirect(route('dashboard.appearance.frontpage.index'))
            ->with('message_success', '<strong>Success!</strong> ' . $input['type'] . ' saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Select front page type
     *
     * @param  int $name
     * @return Response
     */
    public function select($name)
    {
        $data = App::all()->first();
        $data->theme_frontpage = $name;
        $data->save();

        return redirect(route('dashboard.appearance.frontpage.index'))
            ->with('message_success', '<strong>Success!</strong> Front page changed to <b>' . $name . '</b>!');
    }

}
