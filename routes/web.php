<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','admin')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::match(['put', 'post'],'/categories/update/{id}',[CategoryController::class,'update'])->name('categories.update');
    Route::delete('/categories/destroy/{id}',[CategoryController::class,'destroy'])->name('categories.destroy');

    Route::get('/menus',[MenuController::class,'index'])->name('menus.index');
    Route::get('/menus/create',[MenuController::class,'create'])->name('menus.create');
    Route::post('/menus/store',[MenuController::class,'store'])->name('menus.store');
    Route::get('/menus/edit/{id}',[MenuController::class,'edit'])->name('menus.edit');
    Route::match(['put', 'post'],'/menus/update/{id}',[MenuController::class,'update'])->name('menus.update');
    Route::delete('/menus/destroy/{id}',[MenuController::class,'destroy'])->name('menus.destroy');

    Route::get('/tables',[TableController::class,'index'])->name('tables.index');
    Route::get('/tables/create',[TableController::class,'create'])->name('tables.create');
    Route::get('/reservation',[ReservationController::class,'index'])->name('reservation.index');
    Route::get('/reservation/create',[ReservationController::class,'create'])->name('reservation.create');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
