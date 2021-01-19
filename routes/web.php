<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginrController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register',[RegisterController::class, 'registerCheck']);
Route::get('/register',function()
{
    return view('register');
});

Route::post('/login',[LoginrController::class, 'loginCheck']);
Route::get('/login',function()
{
    return view('login');
})->middleware('guest');

Route::get('home',[HomeController::class, 'index']);

Route::get('logout',function(Request $request){
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
});

Route::post('/home',[AddController::class, 'addCheck']);

Route::post('/home/update/{id}',[AddController::class, 'updateCheck']);

// Route::get('/home/delete/',[AddController::class, 'deleteCheck'])->name('/home/delete/');
Route::get('/home/delete/{id}',[AddController::class, 'deleteCheck'])->name('/home/delete/id}');
