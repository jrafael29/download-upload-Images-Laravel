<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PerfilController extends Controller
{
    public function meuPerfil()
    {
        $idLogado = Auth::user()->id;
        $usuario = Usuario::find($idLogado);
        $images = Image::where('id_autor', $idLogado)->orderBy('id', 'desc')->get();

        return view('usuario.home', [
            'usuario' => $usuario,
            'images' => $images
        ]);
    }


    public function perfilTerceiros($id)
    {
        $usuario = Usuario::find($id);
        $images = Image::where('id_autor', $usuario->id)->orderBy('id', 'desc')->get();
        
        return view('site.terceiros', [
            'usuario' => $usuario,
            'images' => $images
        ]);
    }
}
