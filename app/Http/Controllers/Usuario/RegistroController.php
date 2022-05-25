<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function registro(Request $request){
        return view('usuario.registro');
    }

    public function salvarRegistro(Request $request){
        $dados = $request->only(['nome', 'email', 'password', 'password_confirmation']);

        $validar = Validator::make($dados, [
            'nome' => ['string', 'max:100', 'required'],
            'email' => ['string', 'email', 'max:100', 'required', 'unique:usuarios'],
            'password' => ['string', 'max:100', 'confirmed'],
        ]);

        if($validar->fails()){
            return redirect()->route('registro')->withInput();
        }

        $user = new Usuario();
        $user->nome = $dados['nome'];
        $user->email = $dados['email'];
        $user->password = Hash::make($dados['password']);
        $user->save();

        Auth::login($user);
        return redirect()->route('home');

    }
}
