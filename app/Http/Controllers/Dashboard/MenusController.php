<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Menu;
use App\Page;
use App\Post;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenusController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $menus = Menu::with('links')->get();
        $posts = Post::all();
        $pages = Page::all();

        return view('dashboard.appearance.menus.index', ['menus' => $menus, 'posts' => $posts, 'pages' => $pages]);
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
    public function store(Request $request)
    {
        $addLink = new MenuService;

        $validator = $addLink->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $addLink->create($request->all());

        return redirect(route('dashboard.appearance.menus.index'))
            ->with('message_success', '<strong>Success!</strong> Link successfully added!');
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
