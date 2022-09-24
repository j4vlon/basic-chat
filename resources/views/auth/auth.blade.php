@extends('layouts.header')
@section('title')
	Вход
@endsection
@section('content')
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="POST" action="{{ url('auth')	}}">
					@csrf
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="name" class="@error('name') is-invalid @enderror">
					@error('name')
    <div class="alert alert-danger spare-style">{{ $message }}</div>
@enderror
					<input type="email" name="email" placeholder="Email" class="@error('email') is-invalid @enderror">
					@error('email')
    <div class="alert alert-danger spare-style">{{ $message }}</div>
@enderror
					<input type="password" name="pswd" placeholder="Password" class="@error('pswd') is-invalid @enderror">
					@error('pswd')
    <div class="alert alert-danger spare-style">{{ $message }}</div>
@enderror
					<button type="submit">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form method="POST" action="{{ url('login')	}}">
					@csrf
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" class="@error('email') is-invalid @enderror">
					@error('email')
    <div class="alert alert-danger spare-style">{{ $message }}</div>
@enderror
					<input type="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror">
					@error('password')
    <div class="alert alert-danger spare-style">{{ $message }}</div>
@enderror
					<button type="submit">Login</button>
				</form>
			</div>
@endsection