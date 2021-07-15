<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\HomeController;

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
//home Routes
Route::get('/',[HomeController::class, 'index'])->name('welcome')->middleware('lang');
Route::get('/services',[HomeController::class, 'getServices'])->name('services')->middleware('lang');
Route::get('/portfolio',[HomeController::class, 'getPortfolio'])->name('portfolio')->middleware('lang');
Route::get('/team',[HomeController::class, 'getTeam'])->name('team')->middleware('lang');
Route::get('/about',[HomeController::class, 'getAbout'])->name('about')->middleware('lang');
Route::get('/contact',[HomeController::class, 'getContact'])->name('contact')->middleware('lang');
//Route::get('/register',[HomeController::class, 'register'])->name('register');
//Route::get('/login',[HomeController::class, 'login'])->name('login');

//Route::get('/', function () {
 //   return view('welcome');
//});
Route::get('/layouts/app', function () {
    return view('layouts/app');
});

Route::get('/clients', function(){
    return view('clients');
});

Route::get('admin', function () {
    return view('services.admin_index');
})->name('admin.index');

Route::get('/services/index', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show')->where(['id'=>'[0-9]+']);
Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/edit/{id}', [ServiceController::class, 'edit'])->where(['id' =>'[0-9]+'])->name('services.edit');
Route::put('/services/update/{id}', [ServiceController::class, 'update'])->where(['id' =>'[0-9]+'])->name('services.update');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->where(['id' =>'[0-9]+'])->name('services.destroy');
//pages Routes
Route::resource('pages', PageController::class);
//Team Routes
Route::resource('teams',TeamController::class);
//profile Route
Route::get('/users/profiles', [UserController::class, 'index'])->name('profile');
//user route
Route::get('/profiles/{id}', [ProfileController::class, 'index'])->name('users');
//portfolio Routes
Route::resource('portfolios',PortfolioController::class);
//About Routes
Route::resource('abouts',AboutController::class);
//lang Route
Route::get('/lang/{lang}', [LangController::class, 'setLang'])->where(['lang' => 'ar|en'])->name('lang');







