<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students 
{
    private static $students =[
            [
                "id" => 1,
                "nis" => 1001,
                "nama" => "Pandu",
                "kelas" => "11 PPLG 1",
                "alamat" => "Kudus"
            ],
            [
                "id" => 2,
                "nis" => 1002,
                "nama" => "Zidni",
                "kelas" => "11 PPLG 1",
                "alamat" => "Kudus"
            ],
            [
                "id" => 3,
                "nis" => 1003,
                "nama" => "Altan",
                "kelas" => "11 PPLG 1",
                "alamat" => "Kudus"
            ],
            [
                "id" => 4,
                "nis" => 1004,
                "nama" => "Deka",
                "kelas" => "11 PPLG 1",
                "alamat" => "Bogor"
            ],
            [
                "id" => 5,
                "nis" => 1005,
                "nama" => "Dhanis",
                "kelas" => "11 PPLG 1",
                "alamat" => "Semarang"
            ],
            [
                "id" => 6,
                "nis" => 1006,
                "nama" => "Kanedi",
                "kelas" => "11 PPLG 1",
                "alamat" => "Sumbawa"
            ]
            ];

            public static function all()
            {
                return self:: $students;
            }
}
