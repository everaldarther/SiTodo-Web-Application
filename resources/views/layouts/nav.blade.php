@php
    $currentRouteName = Route::currentRouteName();
@endphp
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<nav class="navbar navbar-expand-md navbar-light bg-light border border-bottom sticky-top">
    <div class="container">
        <a href="{{'/'}}" class="navbar-brand me-5"><img src="{{ Vite::asset('resources/images/logo.svg') }}" alt=""></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <li class=" me-3 text-decoration-none fw-medium"><a style="font-size: 20px" class="nav-link @if($currentRouteName == 'welcome') text-primary @endif" href="{{ route('welcome') }}">Home</a></li>
                <li class=" me-3 text-decoration-none fw-medium"><a style="font-size: 20px" class="nav-link @if($currentRouteName == 'features') text-primary @endif" href="{{ route('features') }}">Features</a></li>
                <li class=" me-3 text-decoration-none fw-medium"><a style="font-size: 20px" class="nav-link @if($currentRouteName == 'help') text-primary @endif" href="{{ route('help') }}">Help</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a style="font-size: 18px" class="nav-link btn px-3 py-1 rounded-2 text-primary fw-medium" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a style="font-size: 18px" class="nav-link btn btn-light border border-primary px-3 py-1 rounded-2 text-primary fw-medium me-2" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a href="{{ route ('dashboard') }}" class="nav-link @if($currentRouteName == 'dashboard') text-white @endif"><i class="bi bi-speedometer"></i> Dashboard</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

