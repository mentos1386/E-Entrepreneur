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
     *  Return contents of themes config.json about array
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
     *  Return contents of themes config.json appearance array
     *
     * @return mixed
     */
    public static function appearance()
    {
        $file = base_path() . '/resources/views/themes/' . App::first()->theme . '/config.json';
        $file = json_decode(file_get_contents($file), true);

        return $file['appearance'];
    }

    /**
     *  Return contents of themes config.json appearance array
     *
     * @return mixed
     */
    public static function front_page($param)
    {
        $file = base_path() . '/resources/views/themes/' . App::first()->theme . '/config.json';
        $file = json_decode(file_get_contents($file), true);


        foreach ($file['appearance']['front_page'] as $name => $data)
        {
            if ($param = "active")
            {
                if ($name == App::first()->theme_frontpage)
                {
                    $data['name'] = $name;

                    return $data;
                }
            }

            if ($param == "default")
            {
                if ($data['default'] == true)
                {
                    $data['name'] = $name;

                    return $data;
                }
            }
        }
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