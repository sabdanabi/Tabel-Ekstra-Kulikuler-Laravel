<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\EkstraController;
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
    Route::post('/add', [StudentsController::class,'store']);
    Route::delete('/delete/{id}', [\App\Http\Controllers\StudentsController::class, 'destroy'])->name('student.delete');
    Route::get('/edit/{id}', [StudentsController::class, 'edit']);
    Route::post('/update/{id}', [StudentsController::class, 'update']);
});