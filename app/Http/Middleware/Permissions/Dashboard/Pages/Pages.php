<?php namespace App\Http\Middleware\Permissions\Dashboard\Pages;

use App\Role;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\Permissions\Permission;

class Pages extends Permission {

     public function check_perm(){

        /*
         *  Make Logic to check if user has Permission!
         *
         *  Return True/False
         */

        $user = Auth::user();

        $permissions = Role::find($user['role_id'])->permission;

        if($permissions->dashboard_pages == 1){
            return true;
        }else
        {
            return false;
        }

    }

}