<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\LoginPage;
use App\Http\Livewire\RegistrationPage;
use App\Http\Livewire\WelcomePage;
use App\Http\Middleware\AccountDuplicationChecker;
use App\Http\Middleware\DoppelChecker;
use App\Http\Middleware\HelloWorld;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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



Route::post(
  '/registration',
  [
    UserController::class,
    'registerNewUser'
  ]
);

Route::post(
  '/login',
  [
    UserController::class,
    'login'
  ]
);

Route::get('/registration', [UserController::class, 'storeNewUser']);

Route::post('/{user_id}/{task_id}/{method}', [TaskController::class, 'createNewTask']);

Route::put('/{user_id}/{task_id}/{method}', [TaskController::class, 'updateTask']);

Route::delete('/{user_id}/{task_id}/{method}', [TaskController::class, 'deleteTask']);