@extends('adminlayout.adminlayout')

@section('body')

<div class="container-fluid">

    <div class="row">

        <!-- Customer Details -->
        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-header">
                    <h4>Customer Details</h4>
                </div>

                <div class="card-body">

                    <p>
                        <strong>Name:</strong><br>
                        {{ $customer->name }}
                    </p>

                    <p>
                        <strong>Email:</strong><br>
                        {{ $customer->email }}
                    </p>

                    <p>
                        <strong>Joined:</strong><br>
                        {{ $customer->created_at->format('d M Y') }}
                    </p>

                    <hr>

                    <p>
                        <strong>Total Orders:</strong>
                        {{ $customer->orders->count() }}
                    </p>

                    <p>
                        <strong>Total Spent:</strong>
                        <span class="text-success fw-bold">
                            Rs. {{ number_format($totalSpent,2) }}
                        </span>
                    </p>

                </div>

            </div>

        </div>

        <!-- Order History -->
        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header">
                    <h4>Order History</h4>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>

                            <tr>

                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse($customer->orders as $order)

                            <tr>

                                <td>#{{ $order->id }}</td>

                                <td>
                                    {{ $order->created_at->format('d M Y') }}
                                </td>

                                <td>
                                    Rs. {{ number_format($order->total,2) }}
                                </td>

                                <td>

                                    @if($order->status == 'Pending')
                                        <span class="badge bg-warning">{{ $order->status }}</span>

                                    @elseif($order->status == 'Processing')
                                        <span class="badge bg-info">{{ $order->status }}</span>

                                    @elseif($order->status == 'Delivered')
                                        <span class="badge bg-success">{{ $order->status }}</span>

                                    @else
                                        <span class="badge bg-secondary">{{ $order->status }}</span>
                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('admin.orders.show',$order->id) }}"
                                       class="btn btn-sm btn-primary">

                                        View Order

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center">
                                    No orders found.
                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection