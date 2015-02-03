<?php namespace App\Helpers;


class Gravatar {

    /**
     * @param $email
     * @param null|string $size
     * @param null $customClass
     * @return string
     */
    public static function get($email, $size = '50', $customClass = null)
    {
        return '<img src="https://secure.gravatar.com/avatar/'. md5(strtolower($email)) .'?s='. $size .'" class="'. $customClass .'">';
    }
}