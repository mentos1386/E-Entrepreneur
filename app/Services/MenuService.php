<?php namespace App\Services;

use App\Link;
use Validator;
use Illuminate\Support\Facades\Auth;

class MenuService {

    /**
     * Get a validator for an incoming create post request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name'       => 'required|max:255',
            'url'        => 'required_without:url_custom',
            'url_custom' => 'required_without:url',
            'menu_id'    => 'required',
        ]);
    }

    /**
     *  Create new Post
     *
     * @param  array $data
     */
    public function create(array $data)
    {
        if ($data['url_custom'] != '')
        {
            $data['url'] = $data['url_custom'];
        }


        if (!(filter_var($data['url'], FILTER_VALIDATE_URL)))
        {
            $data['url'] = url($data['url']);
        }

        $post = Link::create([
            'name'      => $data['name'],
            'url' => $data['url'],
            'menu_id'   => $data['menu_id'],
            'drop_down' => ((isset($data['drop_down'])) ? $data['drop_down'] : '0'),
            'parent'    => ((isset($data['parent'])) ? $data['parent'] : null),
            'icon'      => ((isset($data['icon'])) ? $data['icon'] : null),
        ]);
    }

    /**
     *  Update post
     *
     * @param array $data
     * @param int $id
     */
    public function update(array $data, $id)
    {

        $post = Post::findOrNew($id);

        $post->name = $data['name'];
        $post->url = $data['url'];
        $post->menu_id = $data['menu_id'];
        $post->drop_down = $data['drop_down'];
        $post->parent = $data['parent'];

        $post->save();

    }

}
