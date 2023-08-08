@extends('layouts.app')

@section('content')
    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            /* background: -webkit-linear-gradient(to right, #3E64FF, #5EDFFF, #B2FCFF, #ECFCFF); */

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #3E64FF, #4636FC, #5170FD, #3FC5F0);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 80vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
    <section class="gradient-form py-4" >
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div style="height: 80vh;" class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="{{ Vite::asset('resources/images/Logo.png') }}" style="width: 140px;"
                                            alt="logo">
                                    </div>

                                    <div class="text-center">
                                        <h4 class="mt-1 mb-5 pb-1"> Please Login to Your Account
                                    </div>

                                    <div>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-outline mb-4">
                                                <label for="email"
                                                    class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label for="password"
                                                    class="col-md-4 col-form-label">{{ __('Password') }}</label>
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                                    name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="text-center pt-1 mb-2 pb-1">
                                                <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                    type="submit">{{ __('Login') }}
                                                    @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}">
                                                        </a>
                                                    @endif
                                            </div>

                                            <div class="d-flex align-items-center justify-content-center pb-4">
                                                <p class="mb-0 me-2">Don't have an account?</p>
                                                <a href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-5 p-md-3 mx-md-4">
                                    <img class="img-fluid" src="{{ Vite::asset('resources/images/login.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
