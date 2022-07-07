@extends('layouts.auth')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url({{asset('images/bg-1.jpg')}});"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Login</h3>
                                </div>
                            </div>
                            <form action="{{ route('login') }}" method="POST" class="signin-form">
                                @csrf
                                <div class="form-group mt-3">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label class="form-control-placeholder" for="email">Email</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="password">
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Submit</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-md-left">
                                        <a href="/">Back to Home</a>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">Not a member? <a data-toggle="tab" href="{{ route('register') }}">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
