@extends('adminlayout.adminlayout')


@section('body')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h3>
                Order #{{ $orders->id }}
            </h3>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <h4>Customer Details</h4>

                    <hr>

                    <p><strong>Name :</strong> {{ $orders->name }}</p>
                    <p><strong>Email :</strong> {{ $orders->user->email }}</p>
                    <p><strong>Phone :</strong> {{ $orders->phone }}</p>
                    <p><strong>Address :</strong> {{ $orders->address }}</p>

                </div>

                <div class="col-md-6">

                    <h4>Order Details</h4>

                    <hr>

                    <p>
                        <strong>Status :</strong>

                        <span class="badge bg-warning">
                            {{ $orders->status }}
                        </span>

                    </p>

                    <p>
                        <strong>Payment :</strong>
                        {{ $orders->payment_method }}
                    </p>

                    <p>
                        <strong>Total :</strong>

                        <span class="text-success fw-bold">
                            Rs. {{ number_format($orders->total,2) }}
                        </span>

                    </p>

                    <p>
                        <strong>Ordered On :</strong>

                        {{ $orders->created_at->format('d M Y ') }}

                    </p>

                </div>

            </div>

            <hr>

            <h4>Ordered Products</h4>

            <table class="table table-bordered mt-3">

                <thead class="table-dark">

                    <tr>

                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($orders->orderItems as $item)

                    <tr>

                        <td width="90">

                            <img src="{{ asset('storage/'.$item->product->image) }}"
                                 width="70">

                        </td>

                        <td>

                            {{ $item->product->name }}

                        </td>

                        <td>

                            Rs. {{ number_format($item->price,2) }}

                        </td>

                        <td>

                            {{ $item->quantity }}

                        </td>

                        <td>

                            Rs.
                            {{ number_format($item->price * $item->quantity,2) }}

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

            <div class="text-end">

                <h3 class="text-success">

                    Grand Total :
                    Rs. {{ number_format($orders->total,2) }}

                </h3>

            </div>

        </div>

    </div>

</div>

@endsection