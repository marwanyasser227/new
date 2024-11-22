<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilots Page</title>
    <!-- Bootstrap CSS -->

</head>
@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Pilots</h1>
            <a href="{{ route('users.create') }}" class="btn btn-dark">Add New </a>
        </div>


        <!-- Pilots Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pilots  as $pilot)
                        <tr>
                            @php
                                $i = 0;
                            @endphp
                            <td>{{ $i++ }}</td>
                            <td>{{ $pilot->id }}</td>
                            <td>{{ $pilot->name }}</td>
                            <td>{{ $pilot->email }}</td>
                            <td><span class="badge bg-success">{{ $pilot->role->name }}</span></td>
                            <td class="row justify-content-start gap-3 ">
                                <div class="col-1">
                                    <form action="{{ route('users.show', $pilot->id) }}" method="get" class="">
                                        @csrf
                                        <button type='sumbit' class="btn btn-sm btn-info text-white" title="show"><i
                                                class="bi bi-eye"></i></a>

                                    </form>
                                </div>
                                <div class="col-1">
                                    <form action="{{ route('users.edit', $pilot->id) }}" method="get">
                                        @csrf
                                        <button type='sumbit' class="btn btn-sm btn-warning text-white" title="edit"><i
                                                class="bi bi-pencil"></i></a>

                                    </form>
                                </div>
                                <div class="col-1">
                                    <form action="{{ route('users.edit', $pilot->id) }}" method="get">
                                        @csrf
                                        <button type='sumbit' class="btn btn-sm btn-success text-white" title="liscense"><i
                                                class="bi bi-person-vcard"></i></a>

                                    </form>
                                </div>
                                <div class="col-1">
                                    <form action="{{ route('users.destroy', $pilot->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type='sumbit'id='deleteConfrim' class="btn btn-sm btn-danger text-white"
                                            title="Delete"><i class="bi bi-trash"></i></a>

                                    </form>
                                </div>




                            </td>
                            <td>
                                {{ $pilot->created_at->diffForHumans() }}
                            </td>
                            <td>
                                {{ $pilot->updated_at->diffForHumans() }}
                            </td>
                        </tr>
                    @empty

                        <tr>
                            <h5>there is no data</h5>

                        </tr>
                    @endforelse
                </tbody>


            </table>
        </div>
    </div>
@endsection
