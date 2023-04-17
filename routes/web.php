<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;

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
    if (Auth::check()) {
        return redirect('/profile');
    } else {
        return view('auth.login');
    } 
});

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

Route::get('/chat/{id?}',[ChatController::class,'index'])->middleware('auth' ,'permission:chat');

Route::post('/send',[ChatController::class,"send"])->middleware('auth' ,'permission:chat');

Route::post('/sendtogroup',[ChatController::class,"sendtogroup"])->middleware('auth' ,'permission:chat');

Route::resource('/groupes',GroupController::class)->middleware('auth' ,'permission:chat');

Route::get('download/{id}',[ChatController::class,"download"])->middleware('auth' ,'permission:chat');

Route::resource('/users',UserController::class)->middleware('auth' ,'permission:G-utilisateurs');

Route::post('/forms/submit',[FormController::class , "submit"]);

Route::resource('/forms',FormController::class);






