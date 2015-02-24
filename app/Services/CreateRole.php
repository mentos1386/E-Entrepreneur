<?php namespace App\Services;

use App\Role;
use App\Permission;
use Validator;

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

            // Backend
            'dashboard' => 'required|integer',
            'dashboard_users' => 'required|integer',
            'dashboard_blog_posts' => 'required|integer',
            'dashboard_blog_comments' => 'required|integer',
            'dashboard_statistics' => 'required|integer',
            'dashboard_store_add' => 'required|integer',
            'dashboard_store_orders' => 'required|integer',
            'dashboard_settings_tools' => 'required|integer',
            'dashboard_appearance' => 'required|integer',
            'dashboard_pages' => 'required|integer',

            // Frontend
            'user_comments_post' => 'required|integer',
            'user_store_buy' => 'required|integer',


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

        // Create Role
        Role::create([
            'name' => $data['name'],
            'comment' => $data['comment'],
        ]);

        // Get role id
        $role_id = Role::where('name', $data['name'])->first()->id;

        // Create permissions for role
        Permission::create([

            // Backend
            'dashboard' => $data['dashboard'],
            'dashboard_users' => $data['dashboard_users'],
            'dashboard_blog_posts' => $data['dashboard_blog_posts'],
            'dashboard_blog_comments' => $data['dashboard_blog_comments'],
            'dashboard_statistics' => $data['dashboard_statistics'],
            'dashboard_store_add' => $data['dashboard_store_add'],
            'dashboard_store_orders' => $data['dashboard_store_orders'],
            'dashboard_settings_tools' => $data['dashboard_settings_tools'],
            'dashboard_appearance' => $data['dashboard_appearance'],
            'dashboard_pages' => $data['dashboard_pages'],

            // Frontend
            'user_comments_post' => $data['user_comments_post'],
            'user_store_buy' => $data['user_store_buy'],

            'role_id' => $role_id,
        ]);

    }

}
