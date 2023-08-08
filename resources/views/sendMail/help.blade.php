@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="project-content-pl col-12 col-lg-6 d-flex flex-column">
                <h2 class="mb-4 mt-4 mt-lg-0 text-primary">
                    Tell Us About Your SiTodo Experience And How We Can Help</h2>
                <h5>Thank you for choosing our to-do list app as your productivity partner. Send us questions and your
                    experience using the website that can make us continue to develop to make your experience with our
                    application even more enjoyable.</h5>
            </div>

            <div class="col-12 col-lg-6">
                <form action="sendHelp" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="fullName" class="form-label shadow-sm">
                            <strong class="fs-5">Full Name</strong>
                        </label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label shadow-sm">
                            <strong class="fs-5">Email</strong>
                        </label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="textarea" class="form-label shadow-sm">
                            <strong class="fs-5">Message</strong>
                        </label>
                        <textarea class="form-control" id="textarea" rows="3" name="message" required></textarea>
                    </div>
                    <div class="d-flex justify-content-center mt-5 ">
                        <button type="submit" class="btn btn-primary">
                            <strong class="fs-5">Submit</strong>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="grid text-center text-primary mt-5 py-5">
        <div class="g-col-5 mt-3">
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
            <p class="text-center text-muted">@2023 SiToDo, All rights Reserved by SiToDo</p>
        </footer>
    </div>
@endsection
