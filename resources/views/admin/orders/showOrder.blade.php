@extends('layouts.app')



@section('content')
    <h1>{{ $order->id }}</h1>
    <h1>{{ $order->customer_name }}</h1>
    <h1>{{ $order->amount }}</h1>
    <h1>{{ $order->order_number }}</h1>
    @if ($order->status)
        <h1>completed</h1>
    @else
        <h1>pending</h1>
    @endif
@endsection
