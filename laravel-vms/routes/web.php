<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    //return view('welcome');
    //return view('auth.registration');
    return view('auth.login');
});

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');

Route::post('custom-registration', [CustomAuthController::class, 'custom_registration'])->name('register.custom');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');

Route::post('custom-login', [CustomAuthController::class, 'custom_login'])->name('login.custom');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::post('profile/edit_validation', [ProfileController::class, 'edit_validation'])->name('profile.edit_validation');

Route::get('sub_user', [SubUserController::class, 'index'])->name('sub_user');

Route::get('sub_user/fetchall', [SubUserController::class, 'fetch_all'])->name('sub_user.fetchall');

Route::get('sub_user/add', [SubUserController::class, 'add'])->name('sub_user.add');

Route::post('sub_user/add_validation', [SubUserController::class, 'add_validation'])->name('sub_user.add_validation');

Route::get('sub_user/edit/{id}', [SubUserController::class, 'edit'])->name('edit');

Route::post('sub_user/edit_validation', [SubUserController::class, 'edit_validation'])->name('sub_user.edit_validation');

Route::get('sub_user/delete/{id}', [SubUserController::class, 'delete'])->name('delete');