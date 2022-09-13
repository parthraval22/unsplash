<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ImageRepoInterface;

class ImageController extends Controller
{
    
    private ImageRepoInterface $imageRepo;

    public function __construct(ImageRepoInterface $imageRepo) 
    {
        $this->imageRepo = $imageRepo;
    }

    public function search(Request $request)
    {
        $this->validate($request, ['query' => 'required']);
        $query = $request->get('query');
        $page = $request->get('page') ?? 1;

        return response()->json($this->imageRepo->search($query,$page));
    }

    public function download(Request $request)
    {
        $this->validate($request, ['downloadURL' => 'required']);
        $downloadURL = $request->get('downloadURL');
        
        return $this->imageRepo->download($downloadURL);
    }

    public function myDownloads()
    {
        return $this->imageRepo->downloads();
    }

}
