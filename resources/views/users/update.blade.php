@extends('layouts.app')
@section('content')
    <div class="content">
        @include('layouts.sidebar')
        @include('layouts.header')
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px; margin: 0 auto;">
                            <h5 class="my-3">{{ auth()->user()->name }}</h5>
                            <p class="text-muted mb-1">Full Stack Developer</p>
                            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-7 border-right">
                    <form style="border: 1px solid #d2d2d2; padding: 15px; border-radius: 0.375rem;">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="text-right">Profile Settings</h3>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Name</label>
                                <input type="text" class="form-control" placeholder="{{ auth()->user()->name }}"
                                    value="">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Mobile Number</label>
                                <input type="text" class="form-control" placeholder="enter phone number" value="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <label class="labels mb-2">Address Line</label>
                                <input type="text" class="form-control" placeholder="enter address line" value="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels mb-2">Education</label>
                                <input type="text" class="form-control" placeholder="education" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="labels mb-2">Hard Skills</label>
                                <input type="text" class="form-control" placeholder="Php, Javascript ..." value="">
                            </div>
                            <div class="col-md-6">
                                <label class="labels mb-2">Country</label>
                                <input type="text" class="form-control" placeholder="country" value="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels mb-2">Freelance</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Aviable
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Not aviable
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <button class="btn btn-primary profile-button" type="submit">
                                Save Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
