@extends('layouts.main')

@section('content')
    <h1>{{$title}}</h1>
    <form method="POST" action="/kelas/add">
    @csrf
  <div class="mb-3">
    <label  class="form-label">Kelas Siswa</label>
    <input  class="form-control" id="nama" name="nama" value="{{old('nama,$class->nama')}}">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection