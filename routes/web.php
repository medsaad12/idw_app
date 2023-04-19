<?php

use App\Models\Form;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PresenceController;

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

Route::get('/users', function () {
    return view('chat/users');
})->middleware('auth');

Route::get('/create', function () {
    return view('chat/create_user');
})->middleware('auth');

Route::get('/formulaires', function () {
    return view('chat/formulaires');
})->middleware('auth');

Route::get('/chat/{id?}',[ChatController::class,'index'])->middleware('auth' ,'permission:chat');

Route::post('/send',[ChatController::class,"send"])->middleware('auth' ,'permission:chat');

Route::post('/sendtogroup',[ChatController::class,"sendtogroup"])->middleware('auth' ,'permission:chat');

Route::resource('/groupes',GroupController::class)->middleware('auth' ,'permission:chat');

Route::get('download/{id}',[ChatController::class,"download"])->middleware('auth' ,'permission:chat');

Route::resource('/users',UserController::class)->middleware('auth' ,'permission:G-utilisateurs');

Route::post('/forms/submit',[FormController::class , "submit"])->middleware('auth');

Route::get('/forms/submissions/{id}',[FormController::class , "submissions"]);

Route::get('/forms/sub',function () {
    return view('forms.liste-sub',["forms" => Form::all()]);
});

Route::resource('/forms',FormController::class);

Route::get('/presence/user/{name}',[PresenceController::class , "presence_user" ]);

Route::resource('/presence',PresenceController::class)->middleware('auth','permission:G-présence');




 

