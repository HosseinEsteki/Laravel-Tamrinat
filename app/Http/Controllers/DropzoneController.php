<?php

namespace App\Http\Controllers;

use App\Http\Requests\DropzoneRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DropzoneController extends Controller
{
    public function index()
    {
        return view('dropzone');
    }

    public function send(DropzoneRequest $request)
    {
        $file = $request->file('photo');
//        return $file->getRealPath();
        $photo=Photo::SavePhoto($file, \PhotoPath::Post);
        return $photo->thumbnail_path;
    }

    public function test(DropzoneRequest $request)
    {

        return "YOu ArE in...";
    }
}
