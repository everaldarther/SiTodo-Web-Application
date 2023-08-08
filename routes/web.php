<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeleteUser;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\personTaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkspaceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('features', function () {
    return view('features');
})->name('features');

Route::get('help', function () {
    return view('sendMail.help');
})->name('help');



// Mail Send
Route::post('sendHelp', [MailController::class, 'index']);


Auth::routes();

// Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::resource('profile',ProfileController::class);
});

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

// Workspaces
Route::middleware(['auth'])->group(function () {
    Route::get('/workspace', [WorkspaceController::class, 'index'])->name('workspace');
    Route::get('getWorkspaces', [WorkspaceController::class, 'getData'])->name('workspaces.getData');
    Route::resource('workspaces',WorkspaceController::class);
    // Route::get('/search-users', [WorkspaceController::class, 'searchUser'])->name('search.users');
});

Route::post('deleteUser', DeleteUser::class)->name('deleteUser');

// Tasks
Route::middleware(['auth'])->group(function () {
    Route::get('/task', [TaskController::class, 'index'])->name('task');
    Route::resource('tasks',TaskController::class);
});

//Category
Route::middleware(['auth'])->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::resource('categories',CategoryController::class);
});

//Personal Task
Route::middleware(['auth'])->group(function () {
    Route::get('/persontask', [personTaskController::class, 'index'])->name('persontask');
    Route::resource('persontasks',personTaskController::class);
});

