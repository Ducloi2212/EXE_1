<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

Route::get('dashboard',[CrudUserController::class, 'dashboarddashboard']);

Route::get('home',[CrudUserController::class, 'login'])->name('login');
Route::post('home',[CrudUserController::class, 'authUser'])->name('user.authUser');

Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('view', [CrudUserController::class, 'viewUser'])->name('user.viewUser');

Route::get('list', [CrudUserController::class, 'listUser'])->name('list');

Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome');
});



