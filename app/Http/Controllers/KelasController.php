<?php

namespace App\Http\Controllers;
use App\Models\Kelas;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public static function index(){

        return view('kelas/all',[
            "title" => "Ini adalah daftar jurusan di SMK Raden Umar Said",
            "kelas" => Kelas::all()
        ]);
    }
    
    public function create(){
            return view('kelas.create', [
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
            return redirect('/kelas/all')-> with('success', 'Data siswa berhasil ditambahkan');
        }
       

    }

    public function destroy($id)
    {                       
                            //mencari id berdasarkan id yang sudah ditrima oleh parameter
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return redirect('kelas/all')->with('error', 'Data siswa tidak ditemukan.');
        }
        $kelas->delete();
        return redirect('kelas/all')->with('worked', 'Data berhasil dihapus.');
    }

    public function edit($id)
    {
        return view('kelas.edit',
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
    return redirect('kelas/all')->with('success', 'Data Anda berhasil diupdate');
}
}
