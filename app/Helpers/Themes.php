<?php namespace App\Helpers;

use App\App;

class Themes {

    public static function view($name, $data = array())
    {

        $theme = 'themes.';
        $theme .= App::first()->theme;
        $theme .= '.frontend.';

        if (view()->exists($theme . $name))
        {
            return view($theme . $name, $data);
        } else
        {
            return view('themes.Default.frontend' . $name, $data);
        }
    }

    /**
     *  Return contents of themes config.json
     *
     * @return mixed
     */
    public static function about()
    {
        $file = base_path() . '/resources/views/themes/' . App::first()->theme . '/config.json';
        $file = json_decode(file_get_contents($file), true);

        return $file['about'];
    }

    /**
     *  Generate url to Post
     *
     * @param $postID
     * @return string
     */
    public static function postUrl($postID)
    {
        return route('post.index') . '/' . $postID;
    }

    /**
     *  Generate url to Home
     *
     * @return string
     */
    public static function home()
    {
        return route('home');
    }


}