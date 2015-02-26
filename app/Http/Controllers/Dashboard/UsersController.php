<?php namespace app\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

use App\Services\UserService;

use App\User;
use App\Role;

class UsersController extends Controller {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The Create User implementation.
     *
     * @var CreateUser
     */
    protected $createUser;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::with('role')->paginate(15);


        return view('dashboard.users.index', ['users' => $users]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::with('role', 'comments', 'posts')->findOrFail($id);

        return view('dashboard.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::get();

        return view('dashboard.users.create', ['roles' => $roles]);
    }

    /**
     * Store the specified resource in storage.
     *
     * @param array Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $createUser = new UserService;

        $validator = $createUser->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $createUser->create($request->all());

        return redirect(route('dashboard.users.index'))->with('message', 'User successfully created!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}