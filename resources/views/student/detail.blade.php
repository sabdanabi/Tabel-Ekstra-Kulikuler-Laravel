@extends('layouts.main')

@section('content')
    <h2>Student Detail</h2>
    <div class="form">
        <div class="form-group">
            <label for="">NIS</label>
            <input type="button" class="form-control" name="nis" id="nis" value="{{$student->nis}}" disabled>
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="button" class="form-control" name="nama" id="nama" value="{{$student->nama}}" disabled>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="button" class="form-control" name="alamat" id="alamat" value="{{$student->alamat}}" disabled>
        </div>
        <div class="form-group">
            <label for="">Tanggal lahir</label>
            <input type="button" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{$student->tanggal_lahir}}" disabled>
        </div>
    </div>
@endsection