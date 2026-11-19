@props(['ca'])

<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Categories</h1>
        </div>
    </div>

    <div class="row">
        @foreach($ca as $can)
            <x-category.categorycard :ca="$can"/>
        @endforeach
    </div>
</section>