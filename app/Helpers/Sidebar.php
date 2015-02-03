<?php namespace App\Helpers;
class Sidebar {

    /**
     * @param $text
     * @param $link
     * @param $currentLink
     * @param array $submenu
     * @return string
     */
    public static function Pills ($text, $link, $currentLink, $submenu = array()){

        $response = '';

        if($currentLink !== $link):
            $response .= '<li><a href="'.$link.'">'.$text.'</a></li>';
            return $response;
        else:

            $response .= '<li class="active"><a href="'.$link.'">'.$text.'</a></li>';

            if($submenu != null ){

                $response .= '<div class="sub-menu">';

                foreach($submenu as $item){
                    if($item[2] !== $item[1])
                    {
                        $response .= '<li><a href="' . $item[1] . '">' . $item[0] . '</a></li>';

                    }else
                    {
                        $response .= '<li class="active"><a href="' . $item[1] . '">' . $item[0] . '</a></li>';
                    }
                }

                $response .= '</div>';

            };

            return $response;
        endif;
    }
}