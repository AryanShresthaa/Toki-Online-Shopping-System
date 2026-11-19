@props(['p'])

<div class="col-md-4 mb-4">
    <div class="card product-wap rounded-3 shadow-sm h-100">

        <div class="card position-relative">
            <img class="card-img-top img-fluid"
                 src="{{ asset('storage/' . $p->image) }}"
                 alt="{{ $p->name }}"
                 style="height:280px; object-fit:cover;">

            <div class="card-img-overlay product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled text-center">
                    <li class="mb-2">
                       <a class="btn btn-success px-3" href="{{ route('shop.product.show', $p->id) }}">
                        <i class="fas fa-eye"></i> View Product</a>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card-body">

            <!-- Product Name -->
            <h5 class="fw-bold text-dark mb-1">
                {{ $p->name }}
            </h5>

            <!-- Category -->
            <p class="text-success mb-2">
                {{ $p->category->name }}
            </p>

            <!-- Stock -->
            @if($p->quantity > 0)
                <span class="badge bg-success">
                    In Stock ({{ $p->quantity }})
                </span>
            @else
                <span class="badge bg-danger">
                    Out of Stock
                </span>
            @endif

            <!-- Price -->
            <h4 class="text-success fw-bold mt-3">
                Rs. {{ number_format($p->price, 2) }}
            </h4>

        </div>
    </div>
</div>