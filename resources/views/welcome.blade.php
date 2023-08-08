@extends('layouts.app')

@section('content')
    <div class="container-sm m-auto my-5 d-flex flex-row justify-content-between">
        <div class="left w-50 d-lg-flex flex-column justify-content-center">
            <h1 class="fw-medium text-primary mt-5">Organize Your <br> Task More Easily <br> With US</h1>
            <h5 class=" fw-normal text-secondary my-4">SiToDo helps master your tasks, master your life!</h5>
            <div>
                <a class="btn btn-primary m-auto mt-4 fs-5" href="{{ route('login') }}">Get Started</a>
                <a class="btn btn-primary bg-transparent text-primary border-0 m-auto mt-4 fs-5"
                    href="{{ route('register') }}">Register</a>
            </div>
        </div>
        <div class="right w-50 text-end">
            <img class="img-fluid w-75" src="{{ Vite::asset('resources/images/imglandingpage.jpg') }}" alt="">
        </div>
    </div>

    <div class="container-fluid">
        <div class="grid text-center text-primary py-5">
            <div class="g-col-4">
                <h1>Manage Your Task Just Got a Lot Easier</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row py-5">
            <div class="d-block d-lg-flex py-2">
                <div class="col-12 col-lg-6">
                    <img src="{{ Vite::asset('resources/images/img1.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="project-content-pl col-12 col-lg-6 d-flex flex-column justify-content-center">
                    <h2 class="mb-4 mt-4 mt-lg-0 text-primary">
                        Your one-stop destination for task management
                    </h2>
                    <h5>Welcome to your one-stop destination for task management our top rated todo list application.
                        Whether you're a busy professional, a student, or a homemaker, our app is designed to cater to all
                        your task organization needs. With an intuitive interface and a wide range of features, you can
                        easily create, prioritize, and track tasks effortlessly.</h5>
                </div>
            </div>

            <div class="d-flex flex-column-reverse flex-lg-row py-2">
                <div class="project-content-pr col-12 col-lg-6 d-flex flex-column justify-content-center">
                    <h2 class="mb-4 mt-4 mt-lg-0 text-primary">
                        Experience the future of task management
                    </h2>
                    <h5>Our user friendly interface and intuitive design make task organization a breeze, allowing you to
                        focus on what truly matters. Stay ahead of your schedule with our smart features, ensuring you never
                        miss a deadline again.</h5>
                </div>
                <div class="col-12 col-lg-6">
                    <img src="{{ Vite::asset('resources/images/img2.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-4">
            <h2 class="text-center mb-4 mb-md-5 fs-1 text-primary">
                <strong>Why Choose Us?</strong>
            </h2>

            <div class="col-md-4">
                <div class="card text-bg-primary text-light shadow p-4">
                    <div class="card-body">
                        <img src="{{ Vite::asset('resources/images/card1.jpg') }}" class="img-thumbnail" alt="">
                        <h5 class="card-title text-center mt-4 fs-4">
                            <strong>Optimize Productivity</strong>
                        </h5>
                        <p class="card-text text-center my-4">Optimize productivity and streamline your daily tasks with our
                            cutting-edge todo list application. Harness the power of efficient task management and stay in
                            control of your busy schedule. Experience the benefits of seamless organization, status
                            reminders, and all the features, all designed to help you achieve more in less time. Empower
                            yourself to focus.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-bg-primary text-light shadow p-4">
                    <div class="card-body">
                        <img src="{{ Vite::asset('resources/images/card2.jpg') }}" class="img-thumbnail" alt="">
                        <h5 class="card-title text-center mt-4 fs-4">
                            <strong>No More Missed Deadlines</strong>
                        </h5>
                        <p class="card-text text-center my-4">With our todo list application, say goodbye to missed
                            deadlines and hello to punctuality and efficiency. Our system ensures that you never forget a
                            task or important due date again. Stay on top of your commitments and keeping you informed and
                            proactive. Regain control of your time and eliminate the stress of missed deadlines.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-bg-primary text-light shadow p-4">
                    <div class="card-body">
                        <img src="{{ Vite::asset('resources/images/card3.jpg') }}" class="img-thumbnail" alt="">
                        <h5 class="card-title text-center mt-4 fs-4">
                            <strong>Thousands of Satisfied Users</strong>
                        </h5>
                        <p class="card-text text-center my-4">Thousands of satisfied users have experienced the
                            transformative power of our todo list application. Join the growing community of individuals who
                            have found a more organized and productive way to manage their daily tasks. Discover the ease
                            and efficiency of our app that has garnered praise and positive feedback from countless users
                            worldwide.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid text-center text-primary py-5">
        <div class="g-col-5">
            <h1>Start Organizing Your Work</h1>
            <h1>With Us, SiToDo</h1>
        </div>
    </div>

    <div class="grid text-center text-primary py-3">
        <a class="btn btn-primary m-auto mt-4 fs-5" href="{{ route('login') }}">Get Started</a>
    </div>

    <div class="container">
        <footer class="py-3 my-5 justify-content-center border-top">
            <div class="grid text-center text-primary">
                <h1>SiToDo</h1>
                <div class="g-col-4">
                    <p>Your one-stop destination for task management. Achieve more with less effort!</p>
                </div>
            </div>
            <p class="text-center text-muted">@2023 SiToDo, All Rights Reserved by SiToDo</p>
        </footer>
    </div>
@endsection
