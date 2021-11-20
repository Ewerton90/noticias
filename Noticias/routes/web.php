<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\NoticiaPublicController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImagemController;

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

Route::resources([
	"noticias" => NoticiaController::Class,
	"usuarios" => UserController::Class,
	"imagens" => ImagemController::Class
]);

Route::get('/',[NoticiaPublicController::Class, "index"]);

Route::get("/logout", [LoginController::Class, "logout"]);
Route::get("/login", [LoginController::Class, "index"])->name('login');
Route::post("/login", [LoginController::Class, "store"]);		