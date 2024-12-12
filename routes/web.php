<?php

use App\Http\Controllers\projectController;
use App\Http\Controllers\TaskController;
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

Route::get('/', [UserController::class, 'login'])->name('login.user');
Route::post('/admin/authentification', [UserController::class, 'doLogin'])->name('doLogin.users');

Route::middleware(AuthUserSecurity::class)->group(function () {
    Route::get('admin/acceuil', [UserController::class, 'home'])->name('home');
    Route::get('admin/project/listes', [projectController::class, 'list_project'])->name('listes.project');
    Route::get('admin/project/addProject', [projectController::class, 'addProject'])->name('add.project');
    Route::post('/admin/addGroupes', [projectController::class, 'addGroupes'])->name('addGroupes.project');
    Route::post('/admin/addProject', [projectController::class, 'create_project'])->name('create.project');
    Route::get('admin/project/edit/{id}', [projectController::class, 'edit_project'])->name('edit.project');
    Route::post('/admin/updateProject', [projectController::class, 'update_project'])->name('update.project');
    Route::get('admin/groupes/listes', [projectController::class, 'list_groupes'])->name('list.groupes');
    Route::get('admin/groupes/edit/{id}', [projectController::class, 'edit_groupe'])->name('edit.groupe');
    Route::post('/admin/updateGroupe', [projectController::class, 'updateGroupes'])->name('update.Groupes');
    Route::get('admin/tachess/listes', [TaskController::class, 'listes_taches'])->name('listes.taches');
    Route::post('/admin/addTaches', [TaskController::class, 'add_taches'])->name('add.taches');


    Route::get('/admin/listes-utilisateur', [UserController::class, 'listes_users'])->name('listes.users');
    Route::get('admin/update-account/{id}', [UserController::class, 'update_account'])->name('update.account');

    Route::get('/register', [UserController::class, 'register'])->name('register.user');
    Route::post('/register/addAccount', [UserController::class, 'addAccountUser'])->name('addAccountUser.user');
    Route::post('/register/update-account-user', [UserController::class, 'update_account_user'])->name('update.account.user');
    Route::post('/register/update-password-user', [UserController::class, 'update_password'])->name('update.password');
    Route::get('/admin/logout', [UserController::class, 'logout'])->name('logout.user');

});