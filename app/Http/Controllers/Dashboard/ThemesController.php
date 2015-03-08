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
        // Check if theme has requierd start.php file
        if (!Storage::drive('theme')->exists($name . '/start.php'))
        {
            return redirect()->back()
                ->with('message_danger', '<strong>Whops!</strong> Theme dosn\'t have <strong>start.php</strong> file!');
        }

        // Get custom menus/pages
        include_once(base_path() . '/resources/views/themes/' . $name . '/start.php');
        //

        // Check if start.php is valid
        if ((!isset($page_types)) || (!isset($menus)) || (!isset($about)) || empty($page_types) || empty($menus) || empty($about))
        {
            return redirect()->back()
                ->with('message_danger', '<strong>Whops!</strong> Theme dosn\'t have valid <strong>start.php</strong>!');
        }
        //

        // Save it to database
        $settings = App::first();

        $prev_name = $settings->theme;

        $settings->theme = $name;

        $settings->save();
        //


        // Remove previous menus && links && pagetypes
        Menu::where('id', '>', '0')->delete();
        Link::where('id', '>', '0')->delete();

        // Create temp page type, so that we can delete other
        $temp = Pagetypes::create(['name' => 'temp12w12sr124553', 'description' => 'temp type when theme changing', 'dashboard' => 'default', 'view' => 'temp']);

        $pages = Page::all();

        foreach ($pages as $page)
        {
            $page->pagetypes_id = $temp['id'];
            $page->save();
        }
        //

        Pagetypes::where('id', '!=', $temp['id'])->delete();
        //

        // Create new menus
        foreach ($menus as $menu)
        {
            Menu::create($menu);
        }
        //

        // Create new page types
        foreach ($page_types as $page_type)
        {
            Pagetypes::create($page_type);
        }
        //

        // Set all pages to default page
        $default = Pagetypes::where('name', 'Default')->first();

        $pages = Page::all();

        foreach ($pages as $page)
        {
            $page->pagetypes_id = $default['id'];
            $page->save();
        }
        //

        // Remove temp page type
        Pagetypes::where('name', $temp['name'])->delete();
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
