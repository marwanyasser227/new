<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles Page</title>
    <!-- Bootstrap CSS -->

</head>

@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Roles</h1>
            <a href="{{ route('roles.create') }}" class="btn btn-dark">Add New </a>
        </div>
        <!-- Pilots Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Role ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($roles as $role)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="row justify-content-start gap-3 ">
                                <div class="col-1">
                                    <form action="{{ route('roles.show', $role->id) }}" method="post" class="">
                                        @method('POST')
                                        @csrf
                                        <button type='sumbit' class="btn btn-sm btn-info text-white" title="show"><i
                                                class="bi bi-eye"></i></a>

                                    </form>
                                </div>
                                <div class="col-1">
                                    <form action="{{ route('roles.edit', $role->id) }}" method="get">
                                        @csrf
                                        <button type='sumbit' class="btn btn-sm btn-warning text-white" title="edit"><i
                                                class="bi bi-pencil"></i></a>

                                    </form>
                                </div>
                                <div class="col-1">
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type='sumbit'id='deleteConfrim' class="btn btn-sm btn-danger text-white"
                                            title="Delete"><i class="bi bi-trash"></i></a>

                                    </form>
                                </div>




                            </td>
                            <td>
                                {{ $role->created_at->diffForHumans() }}
                            </td>
                            <td>
                                {{ $role->updated_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
