

@extends('layouts.main')

@section('content')
    <h1>{{$title}}</h1>
    <table class="table table-striped-columns">
        <thead> 
            <th>No</th>
            <th>Nama Ekstrakulikuler</th>
            <th>Nama Pembina</th>
            <th>Deskripsi Ekstrakulikuler</th>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp

            @foreach ($ekstar as $ekstraa)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{ $ekstraa['nama'] }}</td>
                    <td>{{ $ekstraa['nama_pembina'] }}</td>
                    <td>{{ $ekstraa['deskripsi'] }}</td>
                </tr>

                @php
                $no++
            @endphp
            @endforeach
        </tbody>
    </table>
@endsection