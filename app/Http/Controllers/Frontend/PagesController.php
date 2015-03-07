<?php namespace App\Http\Controllers\Frontend;

use App\Helpers\Themes;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use App\Services\PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $url
     * @return Response
     */
    public function show($url)
    {
        $page = Page::with('user', 'role')->where('url', $url)->firstOrFail();

        $checkPermission = new PageService;

        if ($return = $checkPermission->checkPerm($page))
        {
            return $return;
        }

        return Themes::view('.pages.show.' . $page['type'], ['page' => $page]);
    }

    /**
     * Password form for page
     *
     * @param  int $id
     * @return Response
     */
    public function password($id)
    {
        $page_id = Page::findOrFail($id)->id;

        return Themes::view('.pages.password', ['page_id' => $page_id]);

    }

    /**
     * Password check for page
     *
     * @param  Request $request
     * @param int $id
     * @return Response
     */
    public function password_check(Request $request, $id)
    {

        $page = Page::findOrFail($id);

        if (!Hash::check($request->password, $page->password))
        {
            return redirect()->back()->with('message_danger', '<strong>Whops!</strong> Wrong password!');
        }

        // Store access to the page in session
        Session::put('pages_access', [$id]);

        return redirect('/' . $page->url)->with('message_success', '<strong>Success</strong> Successfuly enterd protected page.');

    }
}
