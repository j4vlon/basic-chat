@extends('layouts.header')
@section('title')
	Вход
@endsection
@section('content')
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="POST" action="{{ url('register')	}}">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="гыуктфьу" placeholder="гsername">
					<input type="email" name="email" placeholder="Email">
					<input type="password" name="pswd" placeholder="Password">
					<button type="submit">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form method="POST" action="{{ url('login')	}}">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button type="submit">Login</button>
				</form>
			</div>
@endsection