@props(['p', 'categories'])
<div class="container py-5">
    <div class="row">

 <div class="col-lg-3">

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i> Categories
            </h5>
        </div>

        <ul class="list-group list-group-flush">

            <li class="list-group-item p-0">
                <a href="{{ route('shop') }}"
                   class="category-link {{ request('category') == null ? 'active-category' : '' }}">
                    <i class="fas fa-store me-2"></i>
                    All Products
                </a>
            </li>

            @foreach($categories as $category)
                <li class="list-group-item p-0">
                    <a href="{{ route('shop',['category'=>$category->id]) }}"
                       class="category-link {{ request('category') == $category->id ? 'active-category' : '' }}">
                        <i class="fas fa-angle-right me-2"></i>
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach

        </ul>
    </div>

</div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item"><a class="h3 text-dark text-decoration-none mr-3" href="#">All</a></li>
                        <li class="list-inline-item"><a class="h3 text-dark text-decoration-none mr-3" href="#">Combo</a></li>
                    </ul>
                </div>
                <div class="col-md-6 pb-4">
                    </div>
                    @foreach($p as $product)
                    <x-products.productscard :p="$product"/>
                         @endforeach
            </div> 

        </div> </div> </div>

</footer>