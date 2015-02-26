<?php namespace App\Services;

use App\Post;
use Validator;
use Illuminate\Support\Facades\Auth;

class PostService {

    /**
     * Get a validator for an incoming create post request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'body'  => 'required',
        ]);
    }

    /**
     *  Create new Post
     *
     * @param  array $data
     */
    public function create(array $data)
    {
        $post = Post::create([
            'title'   => $data['title'],
            'body'    => $data['body'],
            'user_id' => $data['user_id'],
        ]);

        // Assign tags
        if (!empty($data['tags']))
        {
            $post->tag()->attach($data['tags']);
        }

        // Assign categories
        if (!empty($data['categories']))
        {
            $post->category()->attach($data['categories']);
        }
    }

    /**
     *  Update post
     *
     * @param array $data
     * @param int $id
     */
    public function update(array $data, $id)
    {

        $post = Post::findOrNew($id);

        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->user_id = $data['user_id'];

        $post->save();

        //Detach previus tags and categories
        $post->tag()->detach();
        $post->category()->detach();

        // Assign tags
        if (!empty($data['tags']))
        {
            $post->tag()->attach($data['tags']);
        }

        // Assign categories
        if (!empty($data['categories']))
        {
            $post->category()->attach($data['categories']);
        }

    }

}
