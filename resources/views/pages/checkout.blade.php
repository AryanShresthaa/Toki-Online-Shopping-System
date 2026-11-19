@extends('layouts.layout')

@section('body')

<div class="container py-5">

    <h2 class="mb-4">
        Checkout
    </h2>

    <div class="row">

        <!-- Billing Details -->

        <div class="col-lg-7">

            <div class="card shadow">

                <div class="card-header bg-success text-white">
                    Billing Details
                </div>

                <div class="card-body">

                    <form action="{{ route('checkout.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label>Name</label>

                            <input type="text"  name="name" value="{{ auth()->user()->name }}" required>

                        </div>

                        <div class="mb-3">

                            <label>Phone Number</label>

                            <input type="text"   name="phone" class="form-control" required>

                        </div>

                        <div class="mb-3">

                            <label>Delivery Address</label>

                            <input type="text" name="address"  rows="4"  class="form-control"  required></input>

                        </div>

                        <div class="mb-3">

                            <label>Payment Method</label>

                            <input type="text"   class="form-control" value="Cash On Delivery" readonly>

                        </div>

                </div>

            </div>

        </div>

        <!-- Order Summary -->

        <div class="col-lg-5">

            <div class="card shadow">

                <div class="card-header bg-dark text-white">
                    Order Summary
                </div>

                <div class="card-body">

                    @foreach($cartItems as $item)

                        <div class="d-flex justify-content-between mb-3">

                            <div>

                                <strong>{{ $item->product->name }}</strong>

                                <br>

                                Qty : {{ $item->quantity }}

                            </div>

                            <div>

                                Rs.
                                {{ number_format($item->product->price * $item->quantity,2) }}

                            </div>

                        </div>

                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between">

                        <h5>Total</h5>

                        <h5 class="text-success">
                            Rs. {{ number_format($total,2) }}
                        </h5>

                    </div>

                    <button class="btn btn-success w-100 mt-4">

                        Place Order

                    </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection