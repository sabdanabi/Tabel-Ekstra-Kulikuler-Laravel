<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\EkstraController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
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

Route::get('/hello', function () {
    return '<h1> Hello World!!! </h1>';
});

Route::get('/home', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "Nama" => "Pandu Sabdanabi",
        "Kelas" => "11 PPLG 1",
        "Foto" => "img/pandu.jpg"
    ]);
});

//Route untuk mengarahkan ke setiap fungsi
// Route::get('/student/all', [StudentsController:: class,'index']);

// Route::get('/student/detail/{id}',[\App\Http\Controllers\StudentsController::class,'show']);

// Route::get('/create', [StudentsController:: class,'create']);

Route::get('/extracurricular',[EkstraController::class,'index']);

Route::group(["prefix" => "/student"],function(){
    //Route untuk mengarahkan ke setiap fungsi
    Route::get('/all', [StudentsController:: class,'index']);
    Route::get('/detail/{student}',[StudentsController::class,'show']);
    Route::get('/create', [StudentsController::class,'create']);
    Route::post('/add', [StudentsController::class,'store']);                                  //seperti nama aslias/nama lain         
    Route::delete('/delete/{id}', [\App\Http\Controllers\StudentsController::class, 'destroy'])->name('student.delete');
    Route::get('/edit/{id}', [StudentsController::class, 'edit']);
    Route::post('/update/{id}', [StudentsController::class, 'update']);
});

Route::group(["prefix" => "/kelas"],function(){
    Route::get('/all', [KelasController:: class,'index']);
    Route::get('/create', [KelasController::class,'create']);
    Route::post('/add', [KelasController::class,'store']);
    Route::delete('/delete/{id}', [\App\Http\Controllers\KelasController::class, 'destroy'])->name('student.delete');
    Route::get('/edit/{id}', [KelasController::class, 'edit']);
    Route::post('/update/{id}', [KelasController::class, 'update']);     
});

Route::group(["prefix" => "/login"],function(){  
    Route::get('/index', [LoginController:: class,'show'])->middleware('guest')->name('login');
    Route::get('/register', [RegisterController:: class,'show']) ->middleware('guest');
    Route::post('/register/add', [RegisterController:: class,'store']);
    Route::post('/index/in',[\App\Http\Controllers\LoginController::class,'authenticate']);
    Route::post('/index/out',[\App\Http\Controllers\LoginController::class,'logout']);
});

Route::group(["prefix" => "/dashboard"],function(){  
    Route::get('/index', [DashboardController:: class,'show'])->middleware('auth');
});