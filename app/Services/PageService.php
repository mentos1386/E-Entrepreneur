<?php namespace App\Services;

use App\Page;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageService {

    /**
     * Get a validator for an incoming create post request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        $v = Validator::make($data, [
            'name'    => 'required|max:255',
            'content' => 'required',
            'url' => 'required|alpha_dash',
            'pagetypes_id' => 'required'
        ]);

        $v->sometimes('url', 'unique:pages', function ($data)
        {
            if ($data['url'] == '')
            {
                return false;
            }

            $page = Page::where('url', $data['url'])->first();

            return (!isset($page['id']));
        });

        return $v;
    }

    /**
     *  Create new Page
     *
     * @param  array $data
     */
    public function create(array $data)
    {
        $page = Page::create([
            'name'     => $data['name'],
            'content'  => $data['content'],
            'url'      => $data['url'],
            'pagetypes_id' => $data['pagetypes_id'],
            'password' => (($data['password'] !== '') ? Hash::make($data['password']) : ''),
        ]);

        // Assign Role [Permission]
        if (!empty($data['role_id']))
        {
            $page->role()->attach($data['role_id']);
        }

        // Assign users [Permission]
        if (!empty($data['user_id']))
        {
            $page->user()->attach($data['user_id']);
        }

    }

    /**
     *  Update Page
     *
     * @param array $data
     * @param int $id
     */
    public function update(array $data, $id)
    {
        $page = Page::findOrNew($id);

        $page->name = $data['name'];
        $page->content = $data['content'];
        $page->url = $data['url'];
        $page->pagetypes_id = $data['pagetypes_id'];
        $page->password = (($data['password'] !== '') ? Hash::make($data['password']) : '');


        $page->save();

        // Assign Role [Permission]
        if (!empty($data['role_id']))
        {
            $page->role()->sync($data['role_id']);
        }

        // Assign users [Permission]
        if (!empty($data['user_id']))
        {
            $page->user()->sync($data['user_id']);
        }

    }

    /**
     *  Checks for Permissions or Password
     *
     * @param array @page
     * @return redirect or abort
     */
    public function checkPerm($page)
    {

        // Check for previous saved access
        if (Session::has('pages_access'))
        {
            foreach (Session::get('pages_access') as $session_access)
            {
                if ($session_access == $page->id)
                {
                    // if it works, return false, weird i know. Just go with it
                    return false;
                }
            }
        }

        // Do you need certain Role or be certain User to access?
        if (!(empty($page['role']) || (empty($page['user']))))
        {

            // TODO: There should be || not &&, If permission specifies role & user;
            // if user is in role and not correct user, he should be allowed!
            // Or just made it possible to select || or && relationship, when creating/editing page!

            foreach ($page['role'] as $role)
            {
                if (Auth::guest())
                {
                    abort(401, 'Unauthorized action.');
                }
                if ($role->id != Auth::user()->role->id)
                {
                    abort(401, 'Unauthorized action.');
                }
            }

            foreach ($page['user'] as $user)
            {
                if (Auth::guest())
                {
                    abort(401, 'Unauthorized action.');
                }
                if ($user->id != Auth::user()->id)
                {
                    abort(401, 'Unauthorized action.');
                }
            }
        }

        // Is password required
        if ($page['password'] !== '')
        {
            return redirect()->route('page.password', [$page]);
        }
    }
}
