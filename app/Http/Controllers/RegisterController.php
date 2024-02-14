<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public static function show(){

        return view('login/register',[
            "title" => "register",
        ]);
    } 

    
    public function store(Request $req){
        $validate =$req->validate([
           'name' => 'required|max:255',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:5|max:255',
        ]);

        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);
        $req->session()->flash('success','Request berhasil,Silahkan login');

        return redirect('/login/index');
    }

}
