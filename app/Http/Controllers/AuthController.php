<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegRequest;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function getAuth()
    {
        if (Auth::check()) {
            return redirect()->intended(route('chat'));
        }
        return view('auth.auth');
    }

    public function postAuth(RegRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('pswd'))
        ]);
        if ($user) {
            Auth::login($user);
            return redirect(route('chat'));
        } else {
            return redirect('auth');
        }
    }

    public function postLogin(LoginRequest $request)
    {
        $formFields = $request->only(['email', 'password']);

        if (Auth::attempt($formFields)) {
            return redirect()->intended(route('chat'));
        }
        return redirect('auth')->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }
}
