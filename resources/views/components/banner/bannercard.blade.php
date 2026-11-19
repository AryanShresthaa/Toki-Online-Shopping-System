@props(['ba', 'comboCategory'])

<div class="container">
    <div class="row p-5">

        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
            <img class="img-fluid"
                 src="{{ asset('storage/' . $ba->image) }}"
                 alt="{{ $ba->title }}">
        </div>

        <div class="col-lg-6 mb-0 d-flex align-items-center">
            <div class="text-align-left align-self-center">
                <h1 class="h1 text-success">{{ $ba->title }}</h1>
                <h3 class="h2">{{ $ba->subtitle }}</h3>

                <p>{{ $ba->description }}</p>
                 <a href="{{ route('shop', ['category' => $comboCategory->id]) }}"
   class="btn btn-success">
    Go Shop
</a>
            </div>
        </div>

    </div>
</div>