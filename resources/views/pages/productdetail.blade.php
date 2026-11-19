@extends('layouts.layout')
@section('body')
@if(session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
  {{session('error')}}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
  <ul class="mb-0">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
@endif
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">

            <!-- Product Image -->
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                 <img src="{{ asset('storage/'.$product->image) }}"
                     class="img-fluid rounded">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                  <h2 class="fw-bold text-dark mb-3">
                            {{ $product->name }}
                    </h2>

                        <div class="mb-4">
    <h5>Description</h5>

    <p class="text-muted">
        {!! nl2br(e($product->description)) !!}
    </p>
</div>
        
                       <h2 class="text-success fw-bold mb-3">
                            Rs. {{ number_format($product->price,2) }}
                        </h2>


                       @if($product->quantity > 0)

<p class="text-success fw-bold mb-3">
    <i class="fas fa-check-circle"></i>
    In Stock ({{ $product->quantity }} available)
</p>

<form action="{{ route('cart.store') }}" method="POST">
    @csrf

    <input type="hidden"
           name="product_id"
           value="{{ $product->id }}">

    <div class="mb-4">
        <label class="fw-bold mb-2">
            Quantity
        </label>

        <input type="number"
               name="quantity"
               value="1"
               min="1"
               max="{{ $product->quantity }}"
               class="form-control"
               style="width:120px;">
    </div>

    <div class="row g-3">

        <div class="col-md-6">
            <button type="submit" class="btn btn-success w-100 py-2">
                <i class="fas fa-cart-plus"></i>
                Add To Cart
            </button>
        </div>

        <div class="col-md-6">
            <button type="button" class="btn btn-warning text-white w-100 py-2">
                <i class="fas fa-bolt"></i>
                Buy Now
            </button>
        </div>

    </div>

</form>

                @else

                <div class="alert alert-danger mt-3">
                    <i class="fas fa-times-circle"></i>
                    Out of Stock
                </div>

                @endif

                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-lg-7 -->

        </div> <!-- row -->
    </div> <!-- container -->
</section>
@endsection