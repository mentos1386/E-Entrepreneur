<?php namespace App\Http\Middleware\Permissions\Dashboard\Settings_Tools;

use App\Role;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\Permissions\Permission;

class Settings_Tools extends Permission {

     public function check_perm(){

        /*
         *  Make Logic to check if user has Permission!
         *
         *  Return True/False
         */

        $user = Auth::user();

        $permissions = Role::find($user['role_id'])->permission;

        if($permissions->dashboard_settings_tools == 1){
            return true;
        }else
        {
            return false;
        }

    }

}