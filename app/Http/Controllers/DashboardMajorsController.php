<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class DashboardMajorsController extends Controller
{
    public static function index()
    {

        return view('dashboard/majors/all', [
            "title" => "Ini adalah daftar jurusan",
            "kelas" => Kelas::all()
        ]);
    }

    public function create()
    {
        return view('dashboard/majors/create', [
            'title' => 'Add Data',
        ]);
    }

    public function store(Request $request)
    {
        //data yg dikirim di validasi disini
        $validateData = $request->validate([
            'nama' => 'required',
        ]);

        //sebuah data akan dibuat dan akan ditambahkan ke database
        $result = Kelas::create($validateData);

        if ($result) {
            return redirect('dashboard/majors/all')->with('success', 'Data siswa berhasil ditambahkan');
        }

    }

    public function destroy($id)
    {                       
                            //mencari id berdasarkan id yang sudah ditrima oleh parameter
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return redirect('dashboard/majors/all')->with('error', 'Data siswa tidak ditemukan.');
        }
        $kelas->delete();
        return redirect('dashboard/majors/all')->with('worked', 'Data berhasil dihapus.');
    }

    public function edit($id)
    {
        return view('dashboard/majors/edit',
        [
            'title' =>'edit nama kelas',
            "kelas" => Kelas::findOrFail($id)
        ]
        );
    }

    public function update(Request $req, $id)
    {
        // Validation rules
        $validateData = $req->validate([
                'nama' => 'required',
            ]);
    
        // Find the student by ID
        $kelas = Kelas::findOrFail($id);
                //digunakan untuk memperbarui record dalam database
        $kelas->update($validateData);
        return redirect('dashboard/majors/all')->with('success', 'Data Anda berhasil diupdate');
    }
}
