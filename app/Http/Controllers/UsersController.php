<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{

	public function getUser()
	{
		return view('users.profile');
	}

	public function userUpdate($id)
	{
		return view('users.update');
	}
}
