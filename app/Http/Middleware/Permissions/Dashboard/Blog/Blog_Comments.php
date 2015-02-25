<?php namespace App\Http\Middleware\Permissions\Dashboard\Blog;

use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Middleware\Permissions\Permission;

class Blog_Comments extends Permission {

     public function check_perm(){

        /*
         *  Make Logic to check if user has Permission!
         *
         *  Return True/False
         */

        $user = Auth::user();

        $permissions = Role::find($user['role_id'])->permission;

         // We use this in sidebar to assign "Active" status
         Session::put('sidebar', 'blog');

        if($permissions->dashboard_blog_comments == 1){
            return true;
        }else
        {
            return false;
        }

    }

}