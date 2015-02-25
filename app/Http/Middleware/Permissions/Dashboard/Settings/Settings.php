<?php namespace App\Http\Middleware\Permissions\Dashboard\Settings;

use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Middleware\Permissions\Permission;

class Settings extends Permission {

     public function check_perm(){

        /*
         *  Make Logic to check if user has Permission!
         *
         *  Return True/False
         */

        $user = Auth::user();

        $permissions = Role::find($user['role_id'])->permission;

         // We use this in sidebar to assign "Active" status
         Session::put('sidebar', 'settings');

        if($permissions->dashboard_settings == 1){
            return true;
        }else
        {
            return false;
        }

    }

}