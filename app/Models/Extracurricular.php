<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular
{
    private static $ekstar =[
        [
            "id" => 1,
            "nama" => "Sepak Bola",
            "nama_pembina" => "Pak Arif",
            "deskripsi" => "Ekstra ini di adakan setiap hari Senin bersama Pak Arif"
        ],
        [
            "id" => 2,
            "nama" => "Basket",
            "nama_pembina" => "Pak Udin",
            "deskripsi" => "Ekstra ini di adakan setiap hari selasa bersama Pak Udin"
        ],
        [
            "id" => 3,
            "nama" => "Silat",
            "nama_pembina" => "Pak Jarwo",
            "deskripsi" => "Ekstra ini di adakan setiap hari Rabu bersama Pak Jarwo"
        ],
        [
            "id" => 4,
            "nama" => "Masak",
            "nama_pembina" => "Bu Lastri",
            "deskripsi" => "Ekstra ini di adakan setiap hari Kamis bersama Bu Lastri"
        ],
        [
            "id" => 5,
            "nama" => "Tenis",
            "nama_pembina" => "Pak Adi",
            "deskripsi" => "Ekstra ini di adakan setiap hari jumat bersama Pak Adi"
        ],
        [
            "id" => 6,
            "nama" => "Kasti",
            "nama_pembina" => "Pak Adit",
            "deskripsi" => "Ekstra ini di adakan setiap hari sabtu bersama Pak Adit"
        ]
        ];

        public static function all()
        {
            return self:: $ekstar;
        }
}
