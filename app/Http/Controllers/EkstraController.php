<?php

namespace App\Http\Controllers;
use App\Models\Extracurricular;

use Illuminate\Http\Request;

class EkstraController extends Controller
{
    public static function index(){

        return view('extracurricular',[
            "title" => "Ini adalah daftar ekstrakulikuler SMK Raden Umar Said",
            "ekstar" => Extracurricular::all()
        ]);
        
    }
}
