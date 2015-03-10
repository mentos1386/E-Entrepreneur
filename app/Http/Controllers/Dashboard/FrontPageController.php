<?php namespace App\Http\Controllers\Dashboard;

use App\App;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Themes;
use App\Page;
use App\Post;
use App\Themedata;
use Illuminate\Http\Request;

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


        // TODO: TRANFORM DATA TO JSON AND SAVE IT TO DATABASE

        $data = [
            'type' => $input['item_name'],

        ];

        dd($request->all());
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
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

}
