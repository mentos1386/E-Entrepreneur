<?php namespace App\Helpers;

use App\App;

class Themes {

    public static function view($name, $data = array())
    {

        $theme = 'themes.';
        $theme .= App::first()->theme;
        $theme .= '.';

        if (view()->exists($theme . $name))
        {
            return view($theme . $name, $data);
        } else
        {
            return view('themes.Default.' . $name, $data);
        }
    }


}