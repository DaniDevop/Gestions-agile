<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthUserSecurity;
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

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/admin/authentification', [UserController::class, 'doLogin'])->name('doLogin.users');

Route::middleware(AuthUserSecurity::class)->group(function () {
    Route::get('admin/acceuil', [UserController::class, 'home'])->name('home');
    Route::get('/register', [UserController::class, 'register'])->name('register.user');
    Route::post('/register/addAccount', [UserController::class, 'addAccountUser'])->name('addAccountUser.user');
});