<?php namespace App\Helpers;

use App\App;
use App\Page;
use App\Post;
use Illuminate\Html\FormFacade as Form;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Generate drop down menu with Posts and Pages
     *
     * @param $param
     * @return string
     */
    public static function html_posts_pages_drop_down($param)
    {
        $pages = Page::all();
        $posts = Post::all();

        $return = '
        <div class="form-group">
            <select class="form-control" name="' . $param . '" data-size="10">

                <option value="">Custom url</option>

                <optgroup label="Pages">
            ';
        foreach ($pages as $page)
        {
            $return .= '<option value="' . self::home() . '/' . $page->url . '">' . $page->name . '</option>';
        }
        $return .= '
                </optgroup>
                <optgroup label="Posts">
                ';
        foreach ($posts as $post)
        {
            $return .= '<option value="' . self::home() . '/post/' . $post->id . '">' . $post->title . '</option>';
        }
        $return .= '
                </optgroup>
            </select>
        </div>
        ';

        return $return;
    }

    /**
     * @param $class
     * @param $name
     * @return string
     */
    public static function icon_picker_search_box($class, $name)
    {
        return '<input class="form-control ' . $class . ' icp icp-auto iconpicker-element iconpicker-input" name="' . $name . '" data-input-search="true" value="fa-plane" type="text">';
    }

    /**
     * @param $class
     * @return string
     */
    public static function icon_picker_script($class)
    {
        return '<script>
                    $(document).ready(function () {
                        $(\'.' . $class . '\').iconpicker();
                    });
                </script>';
    }


    /**
     * Create opening tags for comments form
     *
     * @param $type
     * @param $param
     * @return string Form open and hidden token
     */
    public static function form_open($type, $param = null)
    {
        if ($type == 'comments')
        {
            return Form::open(['url' => route('comments.post')]) . Form::hidden('post_id', $param);
        } elseif ($type == 'login')
        {
            return Form::open(['url' => 'auth/login']);
        }
    }

    /**
     * Create closing tags for comments form
     */
    public static function form_close()
    {
        return Form::close();;
    }
}