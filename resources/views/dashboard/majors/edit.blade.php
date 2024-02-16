@extends('layouts.main_dashboard')

@section('content')
    <h1>{{$title}}</h1>
    <form method="POST" action="/dashboard/majors/update/{{$kelas->id}}">
    @csrf
  <div class="mb-3">
    <label  class="form-label">Nama Kelas</label>
    <input  class="form-control" id="nama" name="nama" value="{{old('nama',$kelas->nama)}}">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection