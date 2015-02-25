<?php namespace App\Http\Middleware\Permissions\Dashboard\Appearance;

use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Middleware\Permissions\Permission;

class Appearance extends Permission {

     public function check_perm(){

        /*
         *  Make Logic to check if user has Permission!
         *
         *  Return True/False
         */

        $user = Auth::user();

        $permissions = Role::find($user['role_id'])->permission;

         // We use this in sidebar to assign "Active" status
         Session::put('sidebar', 'appearance');

        if($permissions->dashboard_appearance == 1){
            return true;
        }else
        {
            return false;
        }

    }

}