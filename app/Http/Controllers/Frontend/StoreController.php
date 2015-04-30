<?php namespace App\Http\Controllers\Frontend;

use App\Categories;
use App\Helpers\Themes;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reviews;
use App\Store;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
     * @param Request $request
     * @return Response
     */
    public function show($id, Request $request)
    {
        $store = Store::with('categories', 'tags', 'buyers', 'reviews')->where('active', 1)->findOrFail($id);

        $reviews = $store->reviews()->orderBy('created_at', 'desc')->paginate(6);

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

    public function search(Request $request)
    {
        $data = $request->all();

        $query = '%' . $data['query'] . '%';

        $store = Store::with('categories', 'buyers', 'reviews')
            ->where('active', 1)
            ->where('name', 'like', $query)
            ->orWhere('description', 'like', $query)
            ->paginate(8);

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

        return Themes::view('store.search', ['store' => $store, 'categories' => $categories, 'data' => $data]);
    }

    public function cart()
    {
        $cart = [];
        $items = [];
        $cost = 0;

        if (Session::has('store.cart')) {
            $cart = Session::get('store.cart');

            $ids = [];

            foreach ($cart as $item) {
                $ids[] = $item['id'];
            }

            $items = Store::find($ids);

            $cnt = 0;
            foreach ($items as $item) {
                foreach ($cart as $cartItem) {
                    if ($item['id'] == $cartItem['id']) {
                        $items[$cnt]['quantaty'] = $cartItem['num'];
                    }
                }

                $cost += $item['price'] * $item['quantaty'];

                $cnt++;
            }
        }

        return Themes::view('store.cart', ['items' => $items, 'cart' => $cart, 'cost' => $cost]);

    }

    public function cartRemove($id)
    {
        if (Session::has('store.cart')) {
            $cart = Session::get('store.cart');

            foreach ($cart as $key => $item) {
                if ($item['id'] == $id) {
                    unset($cart[$key]);

                    Session::forget('store.cart');
                    Session::put('store.cart', $cart);
                }
            }
        }

        return redirect(route('store.cart') . '#cart')->with('message_success', '<strong>Success!</strong> Item removed from cart.');

    }

    public function cartAdd($id)
    {
        $found = false;

        if (Session::has('store.cart')) {
            $cart = Session::get('store.cart');

            $cnt = 0;
            foreach ($cart as $item) {
                if ($item['id'] == $id) {
                    $cart[$cnt] = [
                        'id' => $id,
                        'num' => $item['num'] + 1
                    ];
                    Session::forget('store.cart');
                    Session::put('store.cart', $cart);

                    $found = true;
                }
                $cnt++;
            }
        }
        if (!$found) {
            Session::push('store.cart', [
                'id' => $id,
                'num' => 1
            ]);
        }

        return redirect(route('store.cart'))->with('message_success', '<strong>Success!</strong> Item added to cart.');
    }

    /**
     * @param $reviews
     * @return string
     */
    private function review_rating($reviews)
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
