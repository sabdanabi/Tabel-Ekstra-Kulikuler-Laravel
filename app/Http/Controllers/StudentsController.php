<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public static function index(){

        return view('student/all',[
            "title" => "Ini adalah daftar students kelas 11 PPLG 1",
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
        ]);
    }
    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required'
        ]);

        $result = Student::create($validateData);
        
        if ($result) {
            return redirect('/student/all')-> with('success', 'Data siswa berhasil ditambahkan');
        }
       

    }

    public function destroy($id)
    {
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
            "student" => Student::findOrFail($id)
        ]
        );
    }

    public function update(Request $req, $id)
{
    // Validation rules
    $validateData = $req->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required'
        ]);

    // Find the student by ID
    $student = Student::findOrFail($id);
    $student->update($validateData);
    return redirect('student/all')->with('success', 'Data Anda berhasil diupdate');
}

}
