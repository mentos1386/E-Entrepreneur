<?php namespace App\Helpers;
class Sidebar {


    public static function Pills ($text, $link, $currentLink, $submenu = array()){

        $response = '';
        $submenu_active = null;


        foreach ($submenu as $item)
        {
            if ($item[1] == $currentLink)
            {
                $submenu_active = true;
            }
        }

        if(($link !== $currentLink) && ! $submenu_active)
        {
            $response .= '<li><a href="' . $link . '">' . $text . '</a></li>';

            return $response;
        }
        else
        {

            $response .= '<li class="active"><a href="' . $link . '">' . $text . '</a></li>';

            if ($submenu != null)
            {

                $response .= '<div class="sub-menu">';

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