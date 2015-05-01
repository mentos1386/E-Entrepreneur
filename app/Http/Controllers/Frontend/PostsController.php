<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Themes;
use App\Post;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;

class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // TODO: IT Should be somehow figured out, if theme needs DEC or ASC, and get ONLY that from DB
        $posts = Post::with('tag', 'category', 'user')->orderBy('created_at', 'DEC')->paginate(5);

        $cnt = 0;
        foreach ($posts as $post) {
            // Markdown
            $posts[$cnt]["body"] = Markdown::convertToHtml($post['body']);
            $cnt++;
        }
        $cnt = 0;

        return Themes::view('.post.index', ['posts' => $posts]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::with('comment', 'comment.user', 'tag', 'category', 'user')->findOrFail($id);

        $comments = $post->comment()->orderBy('created_at', 'desc')->paginate(6);

        // Markdown
        $post["body"] = Markdown::convertToHtml($post['body']);

        return Themes::view('.post.show', ['post' => $post, 'comments' => $comments]);
	}


}
