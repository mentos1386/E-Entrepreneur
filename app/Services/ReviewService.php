<?php namespace App\Services;

use App\Reviews;
use Validator;
use Illuminate\Support\Facades\Auth;

class ReviewService
{

    /**
     * Get a validator for an incoming create comment request as guest.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator_guest(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:255|unique:users,username',
            'store_id' => 'required|exists:store,id',
            'comment' => 'required|max:255',
            'rating' => 'required|numeric|max:10|min:1'
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
            'store_id' => 'required|exists:store,id',
            'rating' => 'required|numeric|max:10|min:1'
        ]);
    }

    /**
     *  Create new Comment as guest
     *
     * @param  array $data
     */
    public function create_guest(array $data)
    {
        Reviews::create([
            'comment' => $data['comment'],
            'name' => $data['name'],
            'email' => $data['email'],
            'store_id' => $data['store_id'],
            'user_id' => null,
            'rating' => $data['rating'],
        ]);
    }

    /**
     *  Create new Comment as user
     *
     * @param  array $data
     */
    public function create_user(array $data)
    {
        Reviews::create([
            'comment' => $data['comment'],
            'user_id' => Auth::user()->id,
            'store_id' => $data['store_id'],
            'rating' => $data['rating']
        ]);
    }

}
