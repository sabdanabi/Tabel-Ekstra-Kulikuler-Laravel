@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
            <h1 class="text-2xl font-semibold mb-5 mt-5">{{ $title }}</h1>

                <table class="table table-striped-columns mb-10">
                    <thead class="table-dark">
                        <th>No</th>
                        <th>Major</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($kelas as $class)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $class['nama'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
        </div>
    </div>
@endsection
