@extends('layouts.main')

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
                <p>All</p>
                <p class="mr-8">(11)</p>
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
                            <div id="actions-{{ $student->id }}" class="menu-actions hidden absolute top-full left-0 mt-1 bg-white border rounded p-1 shadow-lg z-10">
                                    <ul>
                                        <li><a href="/student/detail/{{ $student->id }}" class="btn btn-info"><i
                                                    class="fa-solid fa-circle-info"></i> Info</a></li>
                                    </ul>
                                </div>
                        </td>
                    </tr>
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
