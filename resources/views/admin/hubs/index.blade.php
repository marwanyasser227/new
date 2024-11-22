<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubs Page</title>
    <!-- Bootstrap CSS -->

</head>
@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Hubs</h1>
            <a href="{{ route('hubs.create') }}" class="btn btn-dark">Add New </a>
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
                    @foreach ($hubs as $hub)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $hub->id }}</td>
                            <td>{{ $hub->name }}</td>
                            <td class="row justify-content-start gap-3 ">
                                <div class="col-1">
                                    <form action="{{ route('hubs.show', $hub->id) }}" method="post" class="">
                                        @method('POST')
                                        @csrf
                                        <button type='sumbit' class="btn btn-sm btn-info text-white" title="show"><i
                                                class="bi bi-eye"></i></a>

                                    </form>
                                </div>
                                <div class="col-1">
                                    <form action="{{ route('hubs.create', $hub->id) }}" method="get">
                                        @csrf
                                        <button type='sumbit' class="btn btn-sm btn-warning text-white" title="edit"><i
                                                class="bi bi-pencil"></i></a>

                                    </form>
                                </div>
                                <div class="col-1">
                                    <form action="{{ route('hubs.destroy', $hub->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type='sumbit'id='deleteConfrim' class="btn btn-sm btn-danger text-white"
                                            title="Delete"><i class="bi bi-trash"></i></a>

                                    </form>
                                </div>




                            </td>
                            <td>
                                {{ $hub->created_at->diffForHumans() }}
                            </td>
                            <td>
                                {{ $hub->updated_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
