@extends('layouts.layout')

@section('body')

<div class="container py-5">

    <h2 class="mb-4">
        Order #{{ $order->id }}
    </h2>

    <div class="card shadow">

        <div class="card-body">

            <p><strong>Name:</strong> {{ $order->name }}</p>

            <p><strong>Phone:</strong> {{ $order->phone }}</p>

            <p><strong>Address:</strong> {{ $order->address }}</p>

            <p>
                <strong>Status:</strong>

                <span class="badge bg-warning">
                    {{ $order->status }}
                </span>

            </p>

            <hr>

            <h5>Products</h5>

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>Product</th>

                        <th>Price</th>

                        <th>Qty</th>

                        <th>Subtotal</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($order->orderItems as $item)

                    <tr>

                        <td>{{ $item->product->name }}</td>

                        <td>Rs. {{ number_format($item->price,2) }}</td>

                        <td>{{ $item->quantity }}</td>

                        <td>
                            Rs. {{ number_format($item->price * $item->quantity,2) }}
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

            <h4 class="text-end text-success">

                Total : Rs. {{ number_format($order->total,2) }}

            </h4>

        </div>

    </div>

</div>

@endsection