
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissonss Page</title>
    <!-- Bootstrap CSS -->

</head>

    @extends('layouts.app')
    @section('content')
        <div class="container my-5">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Permissons</h1>
                <a href="{{ route('permissons.create') }}" class="btn btn-dark">Add New </a>
            </div>
            <!-- Pilots Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Permissons ID</th>
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
                        @foreach ($permissons as $data)
                            <tr>

                                <td>{{ $i++ }}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->validation }}</td>
                                <td class="row justify-content-start gap-3 ">
                                    <div class="col-1">
                                        <form action="{{ route('permissons.show', $data->id) }}" method="post"
                                            class="">
                                            @method('POST')
                                            @csrf
                                            <button type='sumbit' class="btn btn-sm btn-info text-white" title="show"><i
                                                    class="bi bi-eye"></i></a>

                                        </form>
                                    </div>
                                    <div class="col-1">
                                        <form action="{{ route('permissons.edit', $data->id) }}" method="get">
                                            @csrf
                                            <button type='sumbit' class="btn btn-sm btn-warning text-white"
                                                title="edit"><i class="bi bi-pencil"></i></a>

                                        </form>
                                    </div>
                                    <div class="col-1">
                                        <form action="{{ route('permissons.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type='sumbit'id='deleteConfrim'
                                                class="btn btn-sm btn-danger text-white" title="Delete"><i
                                                    class="bi bi-trash"></i></a>

                                        </form>
                                    </div>




                                </td>
                                <td>
                                    {{ $data->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    {{ $data->updated_at->diffForHumans() }}
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    @endsection
