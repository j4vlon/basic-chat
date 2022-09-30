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

    public function getSignUp()
    {
        if (Auth::check()) {
            return redirect()->intended(route('chat'));
        }
        return view('auth.signup');
    }

    public function postSignUp(RegRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
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

    public function getSignIn()
    {
        if (Auth::check()) {
            return redirect()->intended(route('chat'));
        }
        return view('auth.signin');
    }

    public function postSignIn(LoginRequest $request)
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
