<?php

namespace App\Http\Controllers\Arquivo;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index(Request $request)
    {
        $usuarioLogado = Auth::user()->id;
        $usuario = Usuario::find($usuarioLogado);

        $request->validate([ 'image' => 'required|image|mimes:jpeg,jpg,png' ]);

        if($request->hasFile('image')){
            $requestImage = $request->image ;
            $extensao = $requestImage->extension();
            // gerando um nome 'unico' para a imagem
            $imageNome = md5($requestImage->getClientOriginalName() . strtotime('now') ) . ".". $extensao;

            $requestImage->move(public_path('/assets/media'), $imageNome);

            $image = new Image();
            $image->nome = $imageNome;
            $image->data = date('Y-m-d');
            $image->id_autor = $usuario->id;
            $image->save();

            return redirect()
                ->route('home');
        }else{
            return redirect()->route('home');
        }
    }
}
