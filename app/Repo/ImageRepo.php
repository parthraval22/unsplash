<?php

namespace App\Repo;

use App\Interfaces\ImageRepoInterface;
use App\Client\UnsplashAPIClient;
use App\Models\Image;
use Storage;

class ImageRepo implements ImageRepoInterface 
{
    public function search($query, $page = 1, $perPage = 20)
    {
        $unsplash = new UnsplashAPIClient();

        return $unsplash->search($query, $page, $perPage);
    }

    public function download($downloadURL)
    {
        $contents = file_get_contents($downloadURL);
        $current = time().'.jpg';
        Storage::disk('public')->put($current,$contents);
        
        return Image::create(['path'=>$current]);
    }
    
    public function downloads()
    {
        return Image::get();
    }
}