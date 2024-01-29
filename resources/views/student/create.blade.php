@extends('layouts.main')

@section('content')
    <h1>{{$title}}</h1>
    <form method="POST" action="/student/add">
    @csrf
  <div class="mb-3">
    <label  class="form-label">NIS Siswa</label>
    <input class="form-control"  id="nis" name="nis" value="{{old('nis,$student->nis')}}">
  </div>
  <div class="mb-3">
    <label  class="form-label">Nama Siswa</label>
    <input  class="form-control" id="nama" name="nama" value="{{old('nama,$student->nama')}}">
  </div>
  <div class="mb-3">
    <label  class="form-label">Kelas Siswa</label>
    <select class="form-select" name="kelas_id" id="kelas">
            @foreach($kelas as $item)
                <option name="kelas" value="{{$item -> id}}">{{ $item->nama }}</option>
            @endforeach
    </select>
    <!-- <input  class="form-control"  id="kelas" name="kelas" value="{{old('kelas,$student->kelas')}}"> -->
  </div>
  <div class="mb-3">
    <label class="form-label">Alamat Siswa</label>
    <input  class="form-control" id="alamat" name="alamat" value="{{old('alamat,$student->alamat')}}">
  </div>
  <div class="mb-3">
    <label  class="form-label">Tanggal lahir Siswa</label>
    <input  class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="date" value="{{old('tanggal_lahir,$student->tanggal_lahir')}}">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection