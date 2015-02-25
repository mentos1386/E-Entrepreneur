<?php namespace App\Helpers;
use Illuminate\Support\Facades\Session;

class Sidebar {


    public static function Pills ($text, $name, $link, $currentLink, $submenu = array()){

        $response = '';
        $submenu_active = null;

        // Is current site == to site in link? (Set in Middleware)
        $current_site = Session::get('sidebar');

        foreach ($submenu as $item)
        {
            if ($item[1] == $currentLink)
            {
                $submenu_active = true;
            }
        }

        // Compare link with current url, is any submenu link active?, is site set in middleware same as sidebar?
        if(($link !== $currentLink) && ! $submenu_active && $current_site !== $name )
        {
            // Create response for NOT Active link or any sub menu
            return '<li><a href="' . $link . '">' . $text . '</a></li>';
        }
        else
        {

            // Create response for Active link or any sub menu
            $response .= '<li class="active"><a href="' . $link . '">' . $text . '</a></li>';

            if ($submenu != null)
            {

                $response .= '<div class="sub-menu">';

                // Create Sub menu items
                foreach ($submenu as $item)
                {
                    if ($currentLink !== $item[1])
                    {
                        $response .= '<li><a href="' . $item[1] . '">' . $item[0] . '</a></li>';

                    } else
                    {
                        $response .= '<li class="active"><a href="' . $item[1] . '">' . $item[0] . '</a></li>';
                    }
                }

                $response .= '</div>';

            };

            return $response;
        }
    }
}