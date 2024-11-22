
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions Page</title>
    <!-- Bootstrap CSS -->

</head>


    @extends('layouts.app')
    @section('content')
        <div class="container my-5">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Transactions</h1>
                <a href="{{ route('moneny.create') }}" class="btn btn-dark">Add New </a>
            </div>
            <!-- Pilots Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Transaction_ID</th>
                            <th>Transaction_number</th>
                            <th>Cash</th>
                            <th>Owner</th>
                            <th>Actions</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($transactions as $transcation)
                            <tr>

                                <td>{{ $i++ }}</td>
                                <td>{{ $transcation->id }}</td>
                                <td>{{ $transcation->transaction_number }}</td>
                                <td>{{ $transcation->cash }}$</td>
                                <td>{{ $transcation->owner_id }}</td>
                                <td class="row justify-content-start gap-3 ">
                                    <div class="col-1">
                                        <form action="{{ route('roles.show', $transcation->id) }}" method="post"
                                            class="">
                                            @method('POST')
                                            @csrf
                                            <button type='sumbit' class="btn btn-sm btn-info text-white" title="show"><i
                                                    class="bi bi-eye"></i></a>

                                        </form>
                                    </div>
                                   
                                    <div class="col-1">
                                        <form action="{{ route('moneny.destroy', $transcation->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type='sumbit'id='deleteConfrim'
                                                class="btn btn-sm btn-danger text-white" title="Delete"><i
                                                    class="bi bi-trash"></i></a>

                                        </form>
                                    </div>




                                </td>
                                <td>
                                    {{ $transcation->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    {{ $transcation->updated_at->diffForHumans() }}
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    @endsection
