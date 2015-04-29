<?php namespace App\Http\Controllers\Frontend;

use App\Categories;
use App\Helpers\Themes;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reviews;
use App\Store;
use GrahamCampbell\Markdown\Facades\Markdown;
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
        $store = Store::with('categories', 'buyers', 'reviews')->where('active', 1)->paginate(8);

        $categories = [];

        $cnt = 0;
        foreach ($store as $item) {

            //Remove markdown (We dont want to show it in "preview"
            $store[$cnt]['description'] = strip_tags(Markdown::convertToHtml($item['description']));

            foreach ($item['categories'] as $category) {
                if (!in_array($category['name'], $categories)) {
                    $categories[] = ['name' => $category['name'], 'id' => $category['id']];
                }
            }

            // Append review ratio on the Item
            $store[$cnt]['reviewRatio'] = $this->review_rating($item['reviews']);

            $cnt++;
        }

        return Themes::view('store.index', ['store' => $store, 'categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

        $store = Store::with('categories', 'tags', 'buyers', 'reviews')->where('active', 1)->findOrFail($id);

        $reviews = $store->reviews()->paginate(6);

        $reviewRatio = $this->review_rating($store['reviews']);

        $images = json_decode($store['images'], true);

        // Markdown
        $store["description"] = Markdown::convertToHtml($store['description']);

        return Themes::view('store.show', ['store' => $store, 'images' => $images, 'reviewRatio' => $reviewRatio, 'reviews' => $reviews]);
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function category($id)
    {
        $category = Categories::with('store')->findOrFail($id);

        $store = $category->store()->with('buyers', 'reviews')->where('active', 1)->paginate(8);

        $cnt = 0;
        foreach ($store as $item) {

            //Remove markdown (We dont want to show it in "preview"
            $store[$cnt]['description'] = strip_tags(Markdown::convertToHtml($item['description']));

            // Append review ratio on the Item
            $store[$cnt]['reviewRatio'] = $this->review_rating($item['reviews']);
            $cnt++;
        }
        return Themes::view('store.category.index', ['store' => $store, 'category' => $category]);
    }

    /**
     * @param $reviews
     * @return string
     */
    public function review_rating($reviews)
    {
        $numReviews = count($reviews);
        $reviewScore = 0;
        foreach ($reviews as $review) {
            $reviewScore = $reviewScore + $review->rating;
        }

        if ($numReviews != 0) {
            $reviewRatio = $reviewScore / $numReviews;
        } else {
            $reviewRatio = 0;
        }

        return number_format($reviewRatio, 0, ',', '');
    }

}
