@extends('layouts.layout')

@section('body')

<div class="container py-5">

    <h2 class="mb-4">
        <i class="fas fa-box"></i>
        My Orders
    </h2>

    @forelse($orders as $order)

    <div class="card shadow-sm mb-3">

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-md-3">
                    <strong>Order #{{ $order->id }}</strong>
                </div>

                <div class="col-md-3">
                    Rs. {{ number_format($order->total,2) }}
                </div>

                <div class="col-md-3">

                    @if($order->status=="Pending")
                        <span class="badge bg-warning">
                            Pending
                        </span>
                    @elseif($order->status=="Delivered")
                        <span class="badge bg-success">
                            Delivered
                        </span>
                    @else
                        <span class="badge bg-secondary">
                            {{ $order->status }}
                        </span>
                    @endif

                </div>

                <div class="col-md-3 text-end">

                    <a href="{{ route('orders.show', $order->id) }}"class="btn btn-success btn-sm"> View Details</a>

                </div>

            </div>

        </div>

    </div>

    @empty

        <div class="alert alert-warning">

            You haven't placed any orders yet.

        </div>

    @endforelse

</div>

@endsection