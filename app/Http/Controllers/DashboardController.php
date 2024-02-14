<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public static function show(){

        return view('dashboard.index',[
            "title" => "INI DASHBOARD",
        ]);
    }
}
