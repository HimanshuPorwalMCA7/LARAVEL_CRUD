<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\App;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/en', function () {
    App::setLocale('en');
    return view('welcome');
});

Route::get('/hi', function () {
    App::setLocale('hi');
    return view('welcome');
});


Route::get('/register', [RegisterController::class, 'form'])->middleware('logingaurd');
Route::post('/registered',[RegisterController::class,'registered']);
Route::get('/login', [LoginController::class, 'login'])->middleware('logingaurd');
Route::post('/logined',[LoginController::class,'logined']);
Route::get('/dashboard', [dashboardController::class, 'dashboard'])->middleware('gaurd');
Route::post('/logout',[dashboardController::class,'logout']);
Route::get('/add_post',[PostController::class,'add_post'])->middleware('gaurd');
Route::post('/add_post',[PostController::class,'post']);
Route::get('/show_post',[PostController::class,'showpost'])->middleware('gaurd');
Route::delete('/delete_post/{id}',[PostController::class,'deletepost'])->middleware('gaurd');
Route::get('/edit_post/{id}',[PostController::class,'editpost'])->middleware('gaurd');
Route::post('/edit_post/{id}',[PostController::class,'edit']);
Route::post('/update_status/{id}',[PostController::class,'updatestatus']);
Route::get('/user_status',[dashboardController::class,'updatestatus'])->middleware('gaurd');
Route::post('/update/{id}',[dashboardController::class,'update']);
