@extends('layouts.layout')
@section('body')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


<div class="container py-5">

    <h2 class="mb-4">
        <i class="fas fa-shopping-cart"></i>
        My Cart
    </h2>

    @php
        $total = 0;
    @endphp

    @forelse($cartItems as $item)

        @php
            $subtotal = $item->product->price * $item->quantity;
            $total += $subtotal;
        @endphp

     <div class="card shadow-sm border-0 rounded-4 mb-4">
    <div class="card-body p-4">

        <div class="row align-items-center">

            <!-- Product Image -->
            <div class="col-md-2 text-center">
                <img src="{{ asset('storage/'.$item->product->image) }}"
                     class="img-fluid rounded"
                     style="height:100px; width:100px; object-fit:cover;">
            </div>

            <!-- Product Name -->
            <div class="col-md-3">
                <small class="text-muted">Product</small>
                <h5 class="mb-1">{{ $item->product->name }}</h5>
                <span class="badge bg-success">
                    {{ $item->product->category->name }}
                </span>
            </div>

            <!-- Price -->
            <div class="col-md-2 text-center">
                <small class="text-muted d-block">Price</small>
                <h6 class="fw-bold text-success">
                    Rs. {{ number_format($item->product->price,2) }}
                </h6>
            </div>

            <!-- Quantity -->
            <div class="col-md-2 text-center">
                <small class="text-muted d-block">Quantity</small>
                <span class="badge bg-secondary fs-6">
                    {{ $item->quantity }}
                </span>
            </div>

            <!-- Subtotal -->
            <div class="col-md-2 text-center">
                <small class="text-muted d-block">Subtotal</small>
                <h6 class="fw-bold">
                    Rs. {{ number_format($subtotal,2) }}
                </h6>
            </div>

            <!-- Remove -->
            <div class="col-md-1 text-center">
                  <a href="{{ route('cart.delete', $item->id) }}" class="btn btn-outline-danger">
                        <i class="fas fa-trash"></i>
                 </a>
            </div>

        </div>

    </div>
</div>
    @empty

        <div class="alert alert-warning">

            Your cart is empty.

        </div>

    @endforelse

    <div class="card mt-5 shadow">

        <div class="card-body">

            <h3 class="text-end">

                Total : Rs. {{ number_format($total,2) }}

            </h3>

            <div class="text-end mt-3">

              @if($cartItems->count() > 0)

            <a href="{{ route('checkout.index') }}"class="btn btn-warning btn-lg">
    Checkout
</a>

@endif
            </div>

        </div>

    </div>

</div>

@endsection