
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipemnts Page</title>
    <!-- Bootstrap CSS -->

</head>


    @extends('layouts.app')
    @section('content')
        <div class="container my-5">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Shipments</h1>
                <a href="{{ route('shipments.create') }}" class="btn btn-dark">Order New </a>
            </div>
            <!-- Pilots Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Shipment_id</th>
                            <th>hub</th>
                            <th>pilot</th>
                            <th>pickup area</th>
                            <th>cost</th>
                            <th>governate</th>
                            <th>status</th>
                            <th>Actions</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($shipments as $shipment)
                            <tr>

                                <td>{{ $i++ }}</td>
                                <td>{{ $shipment->id }}</td>
                                <td>{{ $shipment->hub_id }}</td>
                                <td>{{ $shipment->bussiness_id }}$</td>
                                <td>{{ $shipment->cost }}</td>
                                <td>{{ $shipment->governate }}</td>
                                <td>{{ $shipment->status }}</td>
                                <td class="row justify-content-start gap-3 ">
                                    <div class="col-1">
                                        <form action="{{ route('roles.show', $shipment->id) }}" method="post"
                                            class="">
                                            @method('POST')
                                            @csrf
                                            <button type='sumbit' class="btn btn-sm btn-info text-white" title="show"><i
                                                    class="bi bi-eye"></i></a>

                                        </form>
                                    </div>
                                    <div class="col-1">
                                        <form action="{{ route('governate.edit', $shipment->id) }}" method="get">
                                            @csrf
                                            <button type='sumbit' class="btn btn-sm btn-warning text-white"
                                                title="edit"><i class="bi bi-pencil"></i></a>

                                        </form>
                                    </div>
                                    <div class="col-1">
                                        <form action="{{ route('moneny.destroy', $shipment->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type='sumbit'id='deleteConfrim'
                                                class="btn btn-sm btn-danger text-white" title="Delete"><i
                                                    class="bi bi-trash"></i></a>

                                        </form>
                                    </div>




                                </td>
                                <td>
                                    {{ $shipment->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    {{ $shipment->updated_at->diffForHumans() }}
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    @endsection
