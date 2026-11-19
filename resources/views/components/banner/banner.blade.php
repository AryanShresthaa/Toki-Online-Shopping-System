@props(['ba', 'comboCategory'])

<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">

    <ol class="carousel-indicators">
        @foreach($ba as $ban)
            <li
                data-bs-target="#template-mo-zay-hero-carousel"
                data-bs-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}">
            </li>
        @endforeach
    </ol>

    <div class="carousel-inner">
        @foreach($ba as $ban)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <x-banner.bannercard
    :ba="$ban"
    :comboCategory="$comboCategory"/>
            </div>
        @endforeach
    </div>

<a class="carousel-control-prev text-decoration-none w-auto ps-3"
   href="#template-mo-zay-hero-carousel"
   role="button"
   data-bs-slide="prev">
    <i class="fas fa-chevron-left"></i>
</a>

<a class="carousel-control-next text-decoration-none w-auto pe-3"
   href="#template-mo-zay-hero-carousel"
   role="button"
   data-bs-slide="next">
    <i class="fas fa-chevron-right"></i>
</a>

</div>