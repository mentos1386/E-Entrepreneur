<?php namespace App\Http\Controllers\Frontend;

use App\Categories;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Themes;
use Illuminate\Http\Request;

class CategoriesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Categories::all();

        return $categories;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $category = Categories::with('post', 'store')->findOrFail($id);

        return Themes::view('.categories.show', ['category' => $category]);
    }


}
