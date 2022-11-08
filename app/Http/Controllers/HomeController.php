<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    // Pending images
    public function index()
    {
        $images = $this->readImagesFromDir("./assets/images/pending/");
        $images = array_slice($images, sizeof($images) - 1);
//        dd($images);
        $showButtons = true;

        return view('home', compact('images', 'showButtons'));
    }

    // Saved images
    public function saved()
    {
        $images = $this->readImagesFromDir("./assets/images/saved/");

        return view('home', compact('images'));
    }

    // Discarded images
    public function discarded()
    {
        $images = $this->readImagesFromDir("./assets/images/discarded/");

        return view('home', compact('images'));
    }

    // Discard image
    public function discardImage()
    {
        $path = request()->get('path');
        rename($path, str_replace('pending', 'discarded', $path));

        return redirect()->route('home');
    }

    // Save image
    public function saveImage()
    {
        $path = request()->get('path');
        rename($path, str_replace('pending', 'saved', $path));

        return redirect()->route('home');
    }

    // Read images from directory
    public function readImagesFromDir($dir)
    {
        $images = [];
        $counter = 0;

        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry == "." || $entry == "..")
                    continue;

                $image = [
                    "id" => $counter,
                    "path" => $dir . $entry
                ];

                $images[] = $image;
                $counter++;
            }
            closedir($handle);
        }
        return $images;
    }
}
