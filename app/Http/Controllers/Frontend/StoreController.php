<?php namespace App\Http\Controllers\Frontend;

use App\Helpers\Themes;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $store = Store::with('categories', 'tags', 'buyers')->paginate();

        return Themes::view('.store.index', ['store' => $store]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $store = Store::with('categories', 'tags', 'buyers')->findOrFail($id);

        $images = json_decode($store['images'], true);

        return Themes::view('.store.show', ['store' => $store, 'images' => $images]);
    }

}
