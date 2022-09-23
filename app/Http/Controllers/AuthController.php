<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegRequest;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class AuthController extends Controller
{

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postRegister(RegRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('pswd')
        ]);
    }
}
