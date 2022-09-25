@extends('layouts.app')
@section('title')
	Вход
@endsection
@section('content')
<div class="content">
<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="POST" action="{{ url('auth')	}}">
					@csrf
					<label for="chk" aria-hidden="true" class="auth-label">Sign up</label>
					<input type="text" name="name" placeholder="name" class="auth-input @error('name') is-invalid @enderror">
					@error('name')
    <div class="alert alert-danger spare-style">{{ $message }}</div>
@enderror
					<input type="email" name="email" placeholder="Email" class="auth-input @error('email') is-invalid @enderror">
					@error('email')
    <div class="alert alert-danger spare-style">{{ $message }}</div>
@enderror
					<input type="password" name="pswd" placeholder="Password" class="auth-input @error('pswd') is-invalid @enderror">
					@error('pswd')
    <div class="alert alert-danger spare-style">{{ $message }}</div>
@enderror
					<button type="submit" class="auth-button">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form method="POST" action="{{ url('login')	}}">
					@csrf
					<label for="chk" aria-hidden="true" class="auth-label">Login</label>
					<input type="email" name="email" placeholder="Email" class="auth-input @error('email') is-invalid @enderror">
					@error('email')
    <div class="alert alert-danger spare-style">{{ $message }}</div>
@enderror
					<input type="password" name="password" placeholder="Password" class="auth-input @error('password') is-invalid @enderror">
					@error('password')
    <div class="alert alert-danger spare-style">{{ $message }}</div>
@enderror
					<button type="submit" class="auth-button">Login</button>
				</form>
			</div>
			</div>
			</div>
@endsection