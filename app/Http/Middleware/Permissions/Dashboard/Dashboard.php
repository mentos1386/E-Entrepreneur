<?php namespace App\Http\Middleware\Permissions\Dashboard;

use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Middleware\Permissions\Permission;

class Dashboard extends Permission {

     public function check_perm(){

        /*
         *  Return True/False
         */

        $user = Auth::user();

        $permissions = Role::find($user['role_id'])->permission;

         // We use this in sidebar to assign "Active" status
         Session::put('sidebar', 'dashboard');

        if($permissions->dashboard == 1){
            return true;
        }else
        {
            return false;
        }
    }

}