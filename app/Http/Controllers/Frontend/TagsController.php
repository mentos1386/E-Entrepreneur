<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Themes;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller {

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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $tag = Tag::with('post')->findOrFail($id);

        return Themes::view('.tags.show', ['tag' => $tag]);
    }


}
