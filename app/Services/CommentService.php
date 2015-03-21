<?php namespace App\Services;

use App\Comment;
use Validator;
use Illuminate\Support\Facades\Auth;

class CommentService {

    /**
     * Get a validator for an incoming create comment request as guest.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator_guest(array $data)
    {
        return Validator::make($data, [
            'email'   => 'required|email|unique:users',
            'name'    => 'required|max:255|unique:users,username',
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|max:255'
        ]);
    }

    /**
     * Get a validator for an incoming create comment request as user.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator_user(array $data)
    {
        return Validator::make($data, [
            'comment' => 'required|max:255',
        ]);
    }

    /**
     *  Create new Comment as guest
     *
     * @param  array $data
     */
    public function create_guest(array $data)
    {
        Comment::create([
            'comment' => $data['comment'],
            'name'    => $data['name'],
            'email'   => $data['email'],
            'post_id' => $data['post_id'],
            'user_id' => null
        ]);
    }

    /**
     *  Create new Comment as user
     *
     * @param  array $data
     */
    public function create_user(array $data)
    {
        Comment::create([
            'comment' => $data['comment'],
            'user_id' => Auth::user()->id,
            'post_id' => $data['post_id']
        ]);
    }

}
