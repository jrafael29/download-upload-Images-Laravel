<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Usuario;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $images = Image::orderBy('id', 'desc')->paginate(11);

        $usuarios = Usuario::all();
        return view('site.home', [
            'images' => $images,
            'usuarios' => $usuarios
        ]);
    }
}
