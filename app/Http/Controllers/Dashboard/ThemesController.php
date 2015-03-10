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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating/installing a new resource.
     *
     * @return Response
     */
    public function install()
    {
        //
    }

    /**
     * Store a newly created/installed resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Set theme as active
     *
     * @param  string $name
     * @return Response
     */
    public function set($name)
    {
        // Check if theme has requierd config.json file
        if (!Storage::drive('theme')->exists($name . '/config.json'))
        {
            return redirect()->back()
                ->with('message_danger', '<strong>Whops!</strong> Theme dosn\'t have <strong>config.json</strong> file!');
        }

        // Get custom menus/pages
        $file = base_path() . '/resources/views/themes/' . $name . '/config.json';
        $config = json_decode(file_get_contents($file), true);
        //


        // Check if start.php is valid
        if ((!isset($config['about'])) || (!isset($config['appearance']['menus'])) || (!isset($config['appearance']['page_types'])) || (!isset($config['appearance']['front_page'])) || empty($config['about']) || empty($config['appearance']['menus']) || empty($config['appearance']['page_types']) || empty($config['appearance']['front_page']))
        {
            return redirect()->back()
                ->with('message_danger', '<strong>Whops!</strong> Theme dosn\'t have valid <strong>config.json</strong>!');
        }
        //

        // Save it to database
        $settings = App::first();

        $prev_name = $settings->theme;

        $settings->theme = $config['about']['name'];

        //Find default front page, and set it in database
        foreach ($config['appearance']['front_page'] as $name => $front_page)
        {
            foreach ($front_page as $default)
            {
                if ($default == "true")
                {
                    $settings->theme_frontpage = $name;
                }
            }
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

        $directories = Storage::drive('theme')->allDirectories($name . '/public/');
        $files = Storage::drive('theme')->allFiles($name . '/public/');

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
