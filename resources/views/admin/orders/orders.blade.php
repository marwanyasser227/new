<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>

    @extends('layouts.app')



    @section('content')
    <div class="container my-5">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Orders</h1>
            <a href="#" class="btn btn-primary">Add New Order</a>
        </div>

        <!-- Orders Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order )
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->order_number}}</td>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->amount}}</td>
                        <td>
                            @if ($order->status)
                            <span class="badge bg-success">Completed</span>
                            @else
                            <span class="badge bg-warning text-dark">Pending</span>

                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                            <form method="get" action="{{ route('orders.show', $order->id) }}">
                                @method("GET")
                                @csrf
                                <button class="btn btn-sm btn-info text-white" title="Show"><i class="bi bi-eye"></i></button>
                            </form>
                            <form method="post" action="{{ route('orders.edit', $order->id) }}">
                                @method("PUT")
                                @csrf
                                <button class="btn btn-sm btn-warning text-white" title="Edit"><i class="bi bi-pencil"></i></button>
                            </form>

                            <form method="post" action="{{ route('orders.destroy', $order->id) }}">
                                @method("DELETE")
                                @csrf
                                <button class="btn btn-sm btn-danger text-white" title="Delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @endsection

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
