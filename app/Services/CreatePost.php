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
            'title' => 'required|max:255',
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
        return Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => Auth::id(),
        ]);
    }

}
