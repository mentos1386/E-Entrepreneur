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

        // Create Role
        Role::create([
            'name' => $data['name'],
            'comment' => $data['comment'],
        ]);

        // Get role id
        $role_id = Role::where('name', $data['name'])->first()->id;

        // Create permissions for role
        Permission::create([
            'dashboard' => $data['dashboard_view'], //TODO: CHANGE TO dashboard_view
            'users_edit' => $data['users_edit'],
            'comments_post' => $data['comments_post'],
            'comments_moderate' => $data['comments_moderate'],
            'statistics_view' => $data['statistics_view'],
            'store_buy' => $data['store_buy'],
            'store_add' => $data['store_add'],
            'store_orders' => $data['store_orders'],
            'posts_create' => $data['posts_create'],
            'settings_edit' => $data['settings_edit'],
            'role_id' => $role_id,
        ]);

        dd(Role::with('permission')->find($role_id)->toArray());
    }

}
