<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $users = User::all();
        return view('auth.login', ['users' => $users]);
    }

    public function login(Request $request)
    {
        $email = $request->input('email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return back()->withErrors([
                'email' => 'Por favor, insira um endereço de e-mail válido.',
            ]);
        }

        $user = User::where('email', $email)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'O endereço de e-mail fornecido não está associado a uma conta.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
