<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    public function Lity()
    {
        $photos=Photo::all();
        return view('lity',compact('photos'));
    }

    public function RolesApi()
    {
//        $response=Http::get('https://httpbin.org/get');
//        $response=Http::withToken('1|laravel_sanctum_yKgv8i05OIlFuXY0029xo3bHx8NvapRzBxPhhPref9c07242');
        $response=Http::get('http://localhost:8001/api');
        dd($response->json());
    }
}
