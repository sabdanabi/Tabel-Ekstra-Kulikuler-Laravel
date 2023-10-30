<?php

namespace App\Http\Controllers;
use App\Models\Students;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public static function index(){

        return view('student',[
            "title" => "Ini adalah daftar students kelas 11 PPLG 1",
            "students" => Students::all()
        ]);
    }
}
