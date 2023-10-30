@extends('layouts.main')

@section('content')
    <h1>{{ $title }} me</h1>

    <p>Nama: {{ $Nama }}</p>
    <p>Kelas: {{ $Kelas }}</p>
    <p>Foto:</p>
   <img src="{{ $Foto }}" alt="" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px;"
   >

    @endsection