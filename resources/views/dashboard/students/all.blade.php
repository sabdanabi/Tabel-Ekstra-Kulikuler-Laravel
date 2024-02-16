@extends('layouts.main_dashboard')

@section('content')
<div class="container relative">
    <div class="row justify-content-center">
        <div class="text-center">
            <h1 class="text-2xl font-semibold mb-5 mt-5">{{ $title }}</h1>

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

            <div class="flex mb-3">
                <div class="mr-96 bg-blue-700 w-36 h-8 rounded-full flex">
                    <a href="/dashboard/students/create" class="text-white m-auto">Add new Data <i
                            class="fa-solid fa-plus"></i></a>
                </div>
                
                <form action="{{ route('students.search') }}" method="GET" class="ml-72">
                    <input type="text" name="keyword" placeholder="Search..." class="w-80 rounded-2xl">
                    <button type="submit" class="bg-blue-700 w-10 h-10 rounded-full ml-2"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
                </form>

            </div>


            <table class="table table-striped-columns">
                <thead class="bg-transparent border-t">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Major</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->nama }}</td>
                        <td>
                            @if ($student->kelas)
                            {{ $student->kelas->nama }}
                            @else
                            No Class Assigned
                            @endif
                        </td>
                        <td>
                            <button class="ellipsis-btn" data-student-id="{{ $student->id }}" type="button">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <div id="actions-{{ $student->id }}"
                                class="menu-actions hidden absolute top-full left-0 mt-1 bg-white border rounded p-1 shadow-lg z-10">
                                <ul>
                                    <li><a href="/dashboard/students/detail/{{ $student->id }}" class="btn btn-info"><i
                                                class="fa-solid fa-circle-info"></i> Info</a></li>
                                    <li class="py-1"><a href="/dashboard/students/edit/{{ $student->id }}"
                                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    </li>
                                    <li>
                                        <button type="button" class="bg-red-700 w-[70px] h-9 rounded"
                                            data-bs-toggle="modal" data-bs-target="#delete{{ $student->id }}">
                                            <i class="fa-solid fa-delete-left"></i>Delete
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="delete{{ $student->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Yakin ingin menghapus {{ $student->nama }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <form action="{{ url('/dashboard/students/delete/' . $student->id) }}"
                                        method="POST">
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

            <div class="pagination">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
@endsection