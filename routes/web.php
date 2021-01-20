<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginrController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\AdminController;
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
})->middleware('guest')->name('login');

Route::get('home',[HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('logout',function(Request $request){
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
});

Route::post('/home',[AddController::class, 'addCheck']);

Route::post('/home/update/{id}',[AddController::class, 'updateCheck']);

Route::get('/home/delete/{id}',[AddController::class, 'deleteCheck'])->name('/home/delete/id}');




Route::get('admin/login', function()
{
    return view('admin.login');
})->middleware('guest:admin');
Route::post('admin',[LoginController::class,'loginCheck']);

Route::get('admin/home', [App\Http\Controllers\Admin\Auth\HomeController::class,'index'])->name('admin.home');
Route::post('admin/home',[AdminController::class, 'addUser']);
Route::post('/admin/update/{id}',[AdminController::class, 'updateUser']);
Route::get('/admin/delete/{id}',[AdminController::class, 'deleteUser'])->name('/admin/delete/id}');

Route::get('admin/logout',function(Request $request){
    if(Auth::guard('admin')->check()) $redirect = '/admin/login';
        else $redirect = '/';

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect($redirect);
})->name('admin/logout');
