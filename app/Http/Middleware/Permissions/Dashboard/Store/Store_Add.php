<?php namespace App\Http\Middleware\Permissions\Dashboard\Store;

use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


use App\Http\Middleware\Permissions\Permission;

class Store_Add extends Permission {

     public function check_perm(){

        /*
         *  Make Logic to check if user has Permission!
         *
         *  Return True/False
         */

        $user = Auth::user();

        $permissions = Role::find($user['role_id'])->permission;

         // We use this in sidebar to assign "Active" status
         Session::put('sidebar', 'store');

        if($permissions->dashboard_store_add == 1){
            return true;
        }else
        {
            return false;
        }

    }

}