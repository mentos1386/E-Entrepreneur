<?php namespace app\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(15);

        return view('dashboard.users.index', ['users' => $users]);
    }
}