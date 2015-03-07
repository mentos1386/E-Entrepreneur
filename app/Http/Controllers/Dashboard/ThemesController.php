<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use App\App;
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

        // Save it to database
        $settings = App::first();

        $prev_name = $settings->theme;

        $settings->theme = $name;

        $settings->save();
        //

        // Get custom menus/pages
        include_once(base_path() . '/resources/views/themes/' . $name . '/start.php');

        // Remove previous menus && links

        // Create new menus

        // Remove previous pages && set all pages to default page

        // Create new pages

        dd($menus, $pages);

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
