<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DatabukuController;
use App\Http\Controllers\PinjamController;

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
    return view('home');
});

route::get('/login', [LoginController::class, 'index']);
route::post('post', [LoginController::class, 'poslog'])->name('poslog');

Route::get('/register', [RegisController::class, 'showRegistrationForm']);
Route::post('/register', [RegisController::class, 'register']);

route::get('logout', [LogoutController::class, 'logout'] );


route::get('guetsdash', function(){
    return view ('home');
});

route::get('admindash', function(){
    return view ('admin.index');
});

route::get('petugasdash', function(){
    return view ('petugas.index');
});

Route::get('/home', [LoginController::class, 'index'])->name('home');

Route::resource('dashboard/users', AdminUserController::class)->except('show')->middleware('admin');
Route::resource('dashboard/category', CategoryController::class)->except('show')->middleware('admin');
Route::resource('dashboard/databuk', DatabukuController::class)->except('show')->middleware('admin');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');


Route::get('/peminjaman/create', [PinjamController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman', [PinjamController::class, 'store'])->name('peminjaman.store');