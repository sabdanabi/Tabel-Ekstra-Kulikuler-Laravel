@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>{{ $title }}</h1>
               

                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-13" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger col-lg-13" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <table class="table table-striped-columns">
                    <thead class="table-dark">
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($students as $student)
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{ $student -> nis}}</td>
                                <td>{{ $student -> nama }}</td>
                                <td>{{ $student -> kelas -> nama }}</td>
                                <td>
                                    <a href="/student/detail/{{ $student->id }}" class="btn btn-info">
                                        <i class="fa-solid fa-circle-info"></i> Info
                                    </a>
                                    <a href="/student/edit/{{ $student->id }}" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $student->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="delete{{ $student->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus {{ $student->nama }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ url('/student/delete/' . $student->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-2">
                <a href="/student/create" class="btn btn-success">Add new Data</a>
                </div>
                </div>
        </div>
    </div>
@endsection
