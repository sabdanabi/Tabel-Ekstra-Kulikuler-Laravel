<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Kelas;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public static function index(){

        return view('student/all',[
            "title" => "New student data for SMK Raden Umar Said 2025",
            "students" => Student::all()
        ]);
    }   

    public function show($id)
    {
        return view('student.detail',
        [
            'title' =>'detail-student',
            "student" => Student::findOrFail($id)
        ]);}

        public function create()
        {
            return view('student.create', [
                'title' => 'Add Data',
                'kelas' => Kelas::all()
        ]);
    }
    
    public function store(Request $request)
    {
        //data yg dikirim di validasi disini
        $validateData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required'
        ]);

        //sebuah data akan dibuat dan akan ditambahkan ke database
        $result = Student::create($validateData);
        
        if ($result) {
            return redirect('/student/all')-> with('success', 'Data siswa berhasil ditambahkan');
        }
    }

    public function destroy($id)
    {                       
                            //mencari id berdasarkan id yang sudah ditrima oleh parameter
        $student = Student::find($id);

        if (!$student) {
            return redirect('student/all')->with('error', 'Data siswa tidak ditemukan.');
        }
        $student->delete();
        return redirect('student/all')->with('worked', 'Data berhasil dihapus.');
    }

    // app/Http/Controllers/StudentsController.php

    public function edit($id)
    {
        return view('student.edit',
        [
            'title' =>'edit student',
            "student" => Student::findOrFail($id),
            'kelas' => Kelas::all()
        ]
        );
    }

    public function update(Request $req, $id)
{
    // Validation rules
    $validateData = $req->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required'
        ]);

    // Find the student by ID
    $student = Student::findOrFail($id);
            //digunakan untuk memperbarui record dalam database
    $student->update($validateData);
    return redirect('student/all')->with('success', 'Data Anda berhasil diupdate');
}

}
