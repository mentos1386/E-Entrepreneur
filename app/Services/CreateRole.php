<?php namespace App\Services;

use App\User;
use Illuminate\Validation\Validator;

class CreateRole {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:25|unique:roles',
            'comment' => 'required|max:255',
            'dashboard_view' => 'required|integer',
            'users_edit' => 'required|integer',
            'comments_post' => 'required|integer',
            'comments_moderate' => 'required|integer',
            'statistics_view' => 'required|integer',
            'store_buy' => 'required|integer',
            'store_add' => 'required|integer',
            'store_orders' => 'required|integer',
            'posts_create' => 'required|integer',
            'settings_edit' => 'required|integer',
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
        Permission::create([

        ]);

        Role::create([

        ]);
    }

}
