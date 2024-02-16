<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Kelas;

class DashboardSiswaController extends Controller
{
    public static function index()
    {
        $perPage = 5;
        $students = Student::paginate($perPage);
        $studentTotal = Student::count();

        return view('dashboard/students/all', [
            "title" => "New student data for SMK Raden Umar Said 2025",
            "students" => $students,
            "studentTotal"=> $studentTotal
        ]);
    }

    public function show($id)
    {
        return view(
            'dashboard/students/detail',
            [
                'title' => 'detail-student',
                "student" => Student::findOrFail($id)
            ]
        );
    }

    public function create()
    {
        return view('dashboard/students/create', [
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
            return redirect('/dashboard/students/all')->with('success', 'Data siswa berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        return view(
            'dashboard/students/edit',
            [
                'title' => 'edit student',
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
        return redirect('/dashboard/students/all')->with('success', 'Data Anda berhasil diupdate');
    }

    public function destroy($id)
    {
        //mencari id berdasarkan id yang sudah ditrima oleh parameter
        $student = Student::find($id);

        if (!$student) {
            return redirect('/dashboard/students/all')->with('error', 'Data siswa tidak ditemukan.');
        }
        $student->delete();
        return redirect('/dashboard/students/all')->with('worked', 'Data berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $students = Student::where('nama', 'LIKE', "%$keyword%")
            ->orWhere('nis', 'LIKE', "%$keyword%")
            ->orWhereHas('kelas', function ($query) use ($keyword) {
                $query->where('nama', 'LIKE', "%$keyword%");
            })
            ->paginate(5);

        return view('dashboard/students/all', [
            'title' => 'Search Results',
            'students' => $students
        ]);
    }

}

