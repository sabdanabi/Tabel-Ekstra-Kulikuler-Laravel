@extends('layouts.main')

@section('content')
    <h1>{{$title}}</h1>
    <table class="table table-striped-columns">
        <thead> 
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp

            @foreach ($students as $student)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{ $student['nis'] }}</td>
                    <td>{{ $student['nama'] }}</td>
                    <td>{{ $student['kelas'] }}</td>
                    <td>{{ $student['alamat'] }}</td>
                </tr>

                @php
                $no++
            @endphp
            @endforeach
        </tbody>
    </table>
@endsection