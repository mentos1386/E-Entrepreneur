<?php namespace App\Services;

use App\Role;
use App\Permission;
use Validator;

class RoleService {

    /**
     * Get a validator for an incoming create role request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:25',
            'comment' => 'required|max:255',

            // Backend
            'dashboard' => 'required|integer',
            'dashboard_users' => 'required|integer',
            'dashboard_blog_posts' => 'required|integer',
            'dashboard_blog_comments' => 'required|integer',
            'dashboard_statistics' => 'required|integer',
            'dashboard_store_add' => 'required|integer',
            'dashboard_store_orders' => 'required|integer',
            'dashboard_settings' => 'required|integer',
            'dashboard_appearance' => 'required|integer',
            'dashboard_pages' => 'required|integer',

            // Frontend
            'user_comments_post' => 'required|integer',
            'user_store_buy' => 'required|integer',


        ]);
    }

    /**
     *  Create role
     *
     * @param  array  $data
     */
    public function create(array $data)
    {

        // Create Role
        $role = Role::create([
            'name' => $data['name'],
            'comment' => $data['comment'],
        ]);


        // Create permissions for role
        Permission::create([

            // Backend
            'dashboard'              => $data['dashboard'],
            'dashboard_users'        => $data['dashboard_users'],
            'dashboard_blog_posts'   => $data['dashboard_blog_posts'],
            'dashboard_blog_comments' => $data['dashboard_blog_comments'],
            'dashboard_statistics'   => $data['dashboard_statistics'],
            'dashboard_store_add'    => $data['dashboard_store_add'],
            'dashboard_store_orders' => $data['dashboard_store_orders'],
            'dashboard_settings'     => $data['dashboard_settings'],
            'dashboard_appearance'   => $data['dashboard_appearance'],
            'dashboard_pages'        => $data['dashboard_pages'],

            // Frontend
            'user_comments_post'     => $data['user_comments_post'],
            'user_store_buy'         => $data['user_store_buy'],

            'role_id'                => $role->id,
        ]);
    }

    /**
     *  Update role
     *
     * @param $id
     * @param  array $data
     */
    public function update(array $data, $id)
    {
        //dd($data, $id);

        $role = Role::findOrNew($id);

        $role->name = $data['name'];
        $role->comment = $data['comment'];

        $role->save();

        $role = Role::with('permission')->find($id)->permission;

        // Update permissions for role
        $permissions = Permission::findOrNew($role->id);

        // Backend
        $permissions->dashboard = $data['dashboard'];
        $permissions->dashboard_users = $data['dashboard_users'];
        $permissions->dashboard_blog_posts = $data['dashboard_blog_posts'];
        $permissions->dashboard_blog_comments = $data['dashboard_blog_comments'];
        $permissions->dashboard_statistics = $data['dashboard_statistics'];
        $permissions->dashboard_store_add = $data['dashboard_store_add'];
        $permissions->dashboard_store_orders = $data['dashboard_store_orders'];
        $permissions->dashboard_settings = $data['dashboard_settings'];
        $permissions->dashboard_appearance = $data['dashboard_appearance'];
        $permissions->dashboard_pages = $data['dashboard_pages'];

        // Frontend
        $permissions->user_comments_post = $data['user_comments_post'];
        $permissions->user_store_buy = $data['user_store_buy'];

        $permissions->save();


    }


}
