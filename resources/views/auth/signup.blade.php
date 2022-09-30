@extends('layouts.app')
@section('title')
    Регистрация
@endsection
@section('content')
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
							<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
									<span class="sr-only">Loading...</span>
							</div>
					</div> --}}
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <form method="POST" action="{{ url('auth') }}" class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        @csrf
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                            </a>
                            <h3>Вход</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="name"
                                class="auth-input @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="alert alert-danger spare-style">{{ $message }}</div>
                            @enderror
                            <label for="floatingText">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email"
                                class="auth-input @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="alert alert-danger spare-style">{{ $message }}</div>
                            @enderror
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="pswd" placeholder="Password"
                                class="auth-input @error('pswd') is-invalid @enderror">
                            @error('pswd')
                                <div class="alert alert-danger spare-style">{{ $message }}</div>
                            @enderror
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="/signin">Sign In</a></p>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>
@endsection
