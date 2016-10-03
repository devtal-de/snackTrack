<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.basic');
    }


    public function show ($image)
    {
        return response()->file(storage_path('app/images/' . $image));
    }

}
