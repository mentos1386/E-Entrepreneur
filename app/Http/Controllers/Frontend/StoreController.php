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
        $store = Store::with('categories', 'tags', 'buyers', 'reviews')->paginate(6);

        $categories = [];
        $reviewsRatings = [];

        $cnt = 0;
        foreach ($store as $item) {
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
        $store = Store::with('categories', 'tags', 'buyers', 'reviews')->findOrFail($id);

        $reviewRatio = $this->review_rating($store['reviews']);

        $images = json_decode($store['images'], true);

        return Themes::view('.store.show', ['store' => $store, 'images' => $images, 'reviewRatio' => $reviewRatio]);
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

        $reviewRatio = $reviewScore / $numReviews;

        return number_format($reviewRatio, 0, ',', '');
    }

}
