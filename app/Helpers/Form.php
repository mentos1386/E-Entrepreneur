<?php namespace App\Helpers;


class Form {

    /**
     * Check if in there is ID in array
     *
     * @param $selected
     * @param $all
     * @return string
     */
    public static function check_selected($selected, $all)
    {

        if ($selected !== null)
        {
            foreach ($selected as $selected_cat)
            {
                if ($all['id'] == $selected_cat['id'])
                {
                    return 'selected';
                }
            }
        }
    }

    /**
     * Check if strings match
     *
     * @param $selected
     * @param $all
     * @return string
     */
    public static function check_selected_single($selected, $all)
    {

        if ($selected !== null)
        {
            if ($all['id'] == $selected['id'])
            {
                return 'selected';
            }
        }
    }
}