<?php namespace App\Http\Controllers\Frontend;

use App\Post;
use App\App;
use App\Http\Controllers\Controller;
use App\Themedata;
use GrahamCampbell\Markdown\Facades\Markdown;

class HomeController extends Controller {

	/**
	 * Show front page
	 *
	 * @return Response
	 */
	public function index()
	{

		// TODO: IT Should be somehow figured out, if theme needs DEC or ASC, and get ONLY that from DB
        $posts_dec = Post::with('tag', 'category', 'user')->orderBy('created_at', 'DEC')->paginate(5);
        $posts_asc = Post::with('tag', 'category', 'user')->orderBy('created_at', 'ASC')->paginate(5);

		$items = Themedata::all();

        $cnt = 0;
        foreach ($posts_asc as $post) {
            // Markdown
            $posts_asc[$cnt]["body"] = Markdown::convertToHtml($post['body']);
            $cnt++;
        }
        $cnt = 0;
        foreach ($posts_dec as $post) {
            // Markdown
            $posts_dec[$cnt]["body"] = Markdown::convertToHtml($post['body']);
            $cnt++;
        }

		return view('themes.' . App::first()->theme . '.frontend.frontpage.home', ['posts_dec' => $posts_dec, 'posts_asc' => $posts_asc, 'items' => $items]);
	}

}
