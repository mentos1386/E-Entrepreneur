<?php namespace App\Services;

use App\Post;
use Validator;
use Illuminate\Support\Facades\Auth;

class CreatePost {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255|unique:posts',
            'body' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => Auth::id(),
        ]);

        // Find just created post TODO: Find a better way?
        $post = Post::where('title', $data['title'])->first();

        // Assign tags
        if(! empty($data['tags']))
        {
            $post->tag()->attach($data['tags']);
        }

        // Assign categories
        if(! empty($data['categories']))
        {
            $post->category()->attach($data['categories']);
        }
    }

}
