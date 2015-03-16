<?php namespace App\Services;

use App\Link;
use App\Menu;
use Validator;
use Illuminate\Support\Facades\Auth;

class LinkService {

    /**
     * Get a validator for an incoming create link request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name'       => 'required|max:255',
            'pos' => 'required|unique:links,pos,NULL,id,menu_id,' . $data['menu_id'],
            'url'        => 'required_without:url_custom',
            'url_custom' => 'required_without:url',
            'menu_id'    => 'required',
        ]);
    }

    /**
     *  Create new Link
     *
     * @param  array $data
     * @return redirect IF ERROR (Menu is full!)
     */
    public function create(array $data)
    {
        $menu = Menu::with('links')->findOrFail($data['menu_id'])->first();



        if ($data['url_custom'] != '')
        {
            $data['url'] = $data['url_custom'];
        }


        if (!(filter_var($data['url'], FILTER_VALIDATE_URL)))
        {
            $data['url'] = url($data['url']);
        }
        if (!(count($menu['links']) >= $menu['max']))
        {
            Link::create([
                'name'      => $data['name'],
                'pos'       => $data['pos'],
                'url'       => $data['url'],
                'menu_id'   => $data['menu_id'],
                'drop_down' => ((isset($data['drop_down'])) ? $data['drop_down'] : '0'),
                'parent'    => ((isset($data['parent'])) ? $data['parent'] : null),
                'icon'      => ((isset($data['icon'])) ? $data['icon'] : null),
            ]);
        } else
        {
            return $menu['name'];
        }

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
