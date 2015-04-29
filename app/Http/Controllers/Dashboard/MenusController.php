<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Link;
use App\Menu;
use App\Page;
use App\Post;
use App\Services\LinkService;
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
     * Store links to menu
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $addLink = new LinkService;

        $validator = $addLink->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $create = $addLink->create($request->all());

        if ($create != '')
        {
            return redirect()->back()->withInput()
                ->with('message_danger', '<strong>Whops!</strong> Cant add any more links to <b>' . $create . '</b>!');
        }

        return redirect(route('dashboard.appearance.menus.index'))
            ->with('message_success', '<strong>Success!</strong> Link successfully added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $link = Link::find($id)->first()->delete();

        return redirect()->back()
            ->with('message_success', '<strong>Success!</strong> Link successfully deleted!');
    }

}
