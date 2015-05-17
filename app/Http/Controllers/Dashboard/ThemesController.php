<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Link;
use App\Menu;
use App\Page;
use Illuminate\Support\Facades\Storage;
use App\App;
use App\Pagetypes;
use Illuminate\Http\Request;

class ThemesController extends Controller {

    /**
     * Set theme as active
     *
     * @param  string $theme_name
     * @return Response
     */
    public function set($theme_name)
    {
        // TODO: CLEAN THIS MESS UP! And implant errors for folders not writable!

        // Check if theme has required config.json file
        if (!Storage::drive('theme')->exists($theme_name . '/config.json'))
        {
            return redirect()->back()
                ->with('message_danger', '<strong>Whops!</strong> Theme dosn\'t have <strong>config.json</strong> file!');
        }

        // Get custom menus/pages
        $file = base_path() . '/resources/views/themes/' . $theme_name . '/config.json';
        $config = json_decode(file_get_contents($file), true);
        //


        // Check if config.json is valid
        if ((!isset($config['about'])) || (!isset($config['appearance']['menus'])) || (!isset($config['appearance']['page_types'])) || (!isset($config['appearance']['front_page'])) || empty($config['about']) || empty($config['appearance']['menus']) || empty($config['appearance']['page_types']) || empty($config['appearance']['front_page']))
        {
            return redirect()->back()
                ->with('message_danger', '<strong>Whops!</strong> Theme dosn\'t have valid <strong>config.json</strong>!');
        }
        //

        // Save it to database
        $settings = App::first();

        // Save previous name
        $prev_name = $settings->theme;
        //

        $settings->theme = $config['about']['name'];

        //Find default front page, and set it in database
        foreach ($config['appearance']['front_page'] as $name => $front_page)
        {
            foreach ($front_page as $default)
            {
                if ($default == "true")
                {
                    $foundDefault = true;
                    $settings->theme_frontpage = $name;
                }
            }
        }
        if (!isset($foundDefault))
        {
            return redirect()->back()
                ->with('message_danger', '<strong>Whops!</strong> Theme dosn\'t have valid <strong>config.json</strong>!<br><strong>Default Front Page</strong> is missing!');
        }
        //

        $settings->save();
        //


        // Create temp page type and temp menu, so that we can delete other
        $temp_page = Pagetypes::create(['name' => 'sdfc12crfsdsv35we6sd', 'description' => 'temp', 'dashboard' => 'default', 'view' => 'temp']);
        $temp_menu = Menu::create(['name' => 'scdse535jwrjhewg235se3', 'description' => 'temp', 'pos' => 'temp']);

        $pages = Page::all();
        $links = Link::all();

        foreach ($pages as $page)
        {
            $page->pagetypes_id = $temp_page['id'];
            $page->save();
        }

        foreach ($links as $link)
        {
            $link->menu_id = $temp_menu['id'];
            $link->save();
        }
        //

        //
        Pagetypes::where('id', '!=', $temp_page['id'])->delete();
        Menu::where('id', '!=', $temp_menu['id'])->delete();
        //

        // Create new menus
        foreach ($config['appearance']['menus'] as $menu)
        {
            Menu::create($menu);
        }
        //

        // Create new page types
        foreach ($config['appearance']['page_types'] as $page_type)
        {
            Pagetypes::create($page_type);
        }
        //

        // Set all pages to default page and all menus to first menu
        $default = Pagetypes::where('name', 'Default')->first();

        $pages = Page::all();

        foreach ($pages as $page)
        {
            $page->pagetypes_id = $default['id'];
            $page->save();
        }

        $new_menu = Menu::where('id', '!=', $temp_menu['id'])->first();
        $links = Link::all();

        foreach ($links as $link)
        {
            $link->menu_id = $new_menu['id'];
            $link->save();
        }
        //

        // Remove temp page type and temp menus
        Pagetypes::where('id', $temp_page['id'])->delete();
        Menu::where('id', $temp_menu['id'])->delete();
        //

        // Copy Public files
        Storage::drive('public')->deleteDirectory($prev_name);

        $directories = Storage::drive('theme')->allDirectories($theme_name . '/public/');
        $files = Storage::drive('theme')->allFiles($theme_name . '/public/');

        foreach ($directories as $directory)
        {
            Storage::drive('public')->makeDirectory($directory);
        }

        foreach ($files as $file)
        {
            Storage::drive('app')->copy('resources/views/themes/' . $file, 'public/' . $file);
        }

        //

        return redirect()->back()
            ->with('message_success', '<strong>Success!</strong> Theme changed successfully!');

    }

}
