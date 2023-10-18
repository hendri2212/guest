<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/login', function(){
    if (Auth::check()) {
        return redirect('/');
    }else{
        return view('users/login');
    }
})->name('login');
Route::get('/register', function(){
    return view('welcome');
});
Route::post('/login', [UserController::class, 'login']);

Route::get('/home', function () {
    return view('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');

    Route::resource('guest', GuestController::class);
    // Route::post('/updateStatus/{id}', [GuestController::class, 'update']);
    
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});
