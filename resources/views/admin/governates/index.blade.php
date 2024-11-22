

@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Governates Page</title>
    <!-- Bootstrap CSS -->

</head>


        <div class="container my-5">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Governates</h1>
                <a href="{{ route('governate.create') }}" class="btn btn-dark">Add New </a>
            </div>
            <!-- Pilots Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Governate ID</th>
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
                        @foreach ($governates as $governate)
                            <tr>

                                <td>{{ $i++ }}</td>
                                <td>{{ $governate->id }}</td>
                                <td>{{ $governate->name }}</td>
                                <td class="row justify-content-start gap-3 ">
                                    <div class="col-1">
                                        <form action="{{ route('roles.show', $governate->id) }}" method="post"
                                            class="">
                                            @method('POST')
                                            @csrf
                                            <button type='sumbit' class="btn btn-sm btn-info text-white" title="show"><i
                                                    class="bi bi-eye"></i></a>

                                        </form>
                                    </div>
                                    <div class="col-1">
                                        <form action="{{ route('governate.edit', $governate->id) }}" method="get">
                                            @csrf
                                            <button type='sumbit' class="btn btn-sm btn-warning text-white"
                                                title="edit"><i class="bi bi-pencil"></i></a>

                                        </form>
                                    </div>
                                    <div class="col-1">
                                        <form action="{{ route('governate.destroy', $governate->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type='sumbit'id='deleteConfrim'
                                                class="btn btn-sm btn-danger text-white" title="Delete"><i
                                                    class="bi bi-trash"></i></a>

                                        </form>
                                    </div>




                                </td>
                                <td>
                                    {{ $governate->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    {{ $governate->updated_at->diffForHumans() }}
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    @endsection


