<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function cadastro()
    {
        return view('login.cadastro-usuario');
    }

    public function handleGoogleCallback()
    {
        dd('chegou aqui');
        $userG = Socialite::driver('google')->user();
        $existingUser = Usuario::where('email', $userG->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            // Se o usuário não existir, você pode criar um novo usuário aqui se desejar

            // Exemplo:
            $newUser = new Usuario();
            $newUser->email = $userG->email;
            // Atribua outros campos conforme necessário
            $newUser->save();

            Auth::login($newUser);

        }
        dd($userG);
        #return redirect()->route('cadastro-usuario')->with('googleUser', $userG);  
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
}
