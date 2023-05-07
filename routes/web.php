<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\LoginPage;
use App\Http\Livewire\RegistrationPage;
use App\Http\Livewire\WelcomePage;
use App\Http\Middleware\DoppelChecker;
use App\Http\Middleware\HelloWorld;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
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

// Route::get('/', WelcomePage::class);

// Route::get('/login', LoginPage::class);

// Route::get(
//   '/registration',
//   RegistrationPage::class
// );

// Route::post(
//   '/registration',
//   RegistrationPage::class
// )->middleware(DoppelChecker::class);

// Route::get('/auth/home', HomePage::class);

Route::post(
  '/registration',
  [
    UserController::class,
    'storeNewUser'
  ]
)->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
  ->withoutMiddleware(HelloWorld::class)
  ->middleware(DoppelChecker::class);

Route::get('/registration', [UserController::class, 'getRegistrationPage'])->middleware(HelloWorld::class);

Route::post('/user/task/create', [TaskController::class, 'createNewTask'])
  ->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)
  ->withoutMiddleware(HelloWorld::class)
  ->withoutMiddleware(DoppelChecker::class);