<?php

namespace App\Http\Controllers;
use App\Models\Extracurricular;

use Illuminate\Http\Request;

class EkstraController extends Controller
{
    public static function index(){

        return view('extracurricular',[
            "title" => "Ini adalah daftar ekstrakulikuler kelas 11 PPLG 1",
            "ekstar" => Extracurricular::all()
        ]);
        
    }
}
