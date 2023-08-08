@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-3">
            <div class="d-flex flex-column-reverse flex-lg-row py-5">
                <div class="project-content-pr col-12 col-lg-6 d-flex flex-column justify-content-center">
                    <h2 class="mb-4 mt-4 mt-lg-0 text-primary">
                        Workspaces
                    </h2>
                    <h5>Working with team members is made easier with our collaboration features. You can invite colleagues to join your workspace, share tasks, and communicate and monitor project progress in real-time. You can easily create a workspace for each project or team you are involved with. Each workspace allows you to structure and organize relevant tasks, so you can fully understand and manage project progress.</h5>
                </div>
                <div class="col-12 col-lg-6">
                    <img src="{{ Vite::asset('resources/images/imgworksapces.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>

            <div class="d-block d-lg-flex py-5">
                <div class="col-12 col-lg-6">
                    <img src="{{ Vite::asset('resources/images/imgpersonaltask.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="project-content-pl col-12 col-lg-6 d-flex flex-column justify-content-center">
                    <h2 class="mb-4 mt-4 mt-lg-0 text-primary">
                        Personal Task
                    </h2>
                    <h5>Designed to help you organize and track your personal tasks more efficiently. We understand how valuable time is and how everyday tasks can become incredibly complex. Therefore, we are here with a solution that brings convenience and comfort in managing your personal tasks. Here, you can easily add, edit, and mark your personal tasks according to task status so you no longer have to worry about forgotten or pending tasks.</h5>
                </div>
            </div>

            <div class="d-flex flex-column-reverse flex-lg-row py-2">
                <div class="project-content-pr col-12 col-lg-6 d-flex flex-column justify-content-center">
                    <h2 class="mb-4 mt-4 mt-lg-0 text-primary">
                        Category
                    </h2>
                    <h5>Do you want to keep personal and work tasks separate? Or maybe you want to group tasks by different project types? No problem! With categories, you can easily track relevant tasks, avoid confusion, and increase efficiency in completing work. We've designed an intuitive system that allows you to manage your daily tasks more easily and conveniently.</h5>
                </div>
                <div class="col-12 col-lg-6">
                    <img src="{{ Vite::asset('resources/images/imgcategory.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="grid text-center text-primary py-2">
        <div class="g-col-5">
            <h1>Start Organizing Your Work</h1>
            <h1>With Us, Si ToDo</h1>
        </div>
    </div>

    <div class="grid text-center text-primary py-5">
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
