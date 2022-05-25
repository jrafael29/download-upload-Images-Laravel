<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('usuario.login');
    }

    public function fazerLogin(Request $request)
    {
        $dados = $request->only(['email', 'password']);

        $validar = Validator::make($dados, [
            'email' => ['required', 'email', 'string', 'max:100'],
            'password' => ['required', 'string', 'max:100']
        ]);

        if($validar->fails()){
            return redirect()
                ->route('login')
                ->withInput();
        }
        if(Auth::attempt($dados)){
            return redirect()->route('home');
        }else{
            return redirect()
                ->route('login')
                ->withInput()
                ->with('warning', 'Email e/ou senha errados');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
