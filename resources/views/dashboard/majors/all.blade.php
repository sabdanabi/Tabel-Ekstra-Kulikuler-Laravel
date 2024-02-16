@extends('layouts.main_dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
            <h1 class="text-2xl font-semibold mb-5 mt-5">{{ $title }}</h1>

                <table class="table table-striped-columns mb-10">
                    <thead class="table-dark">
                        <th>No</th>
                        <th>Major</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($kelas as $class)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $class['nama'] }}</td>
                                <td>
                                <a href="/dashboard/majors/edit/{{ $class->id }}" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $class->id }}">
                                        Delete
                                    </button>
                                </td>

                                <div class="modal fade" id="delete{{ $class->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus {{ $class->nama }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ url('/dashboard/majors/delete/' . $class->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-2">
                <a href="/kelas/create" class="btn btn-success">Add new Data</a>
                </div>
                </div>
        </div>
    </div>
@endsection
