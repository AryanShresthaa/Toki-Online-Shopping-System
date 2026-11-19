     @props(['ca'])
            <div class="col-12 col-md-4 p-5 mt-3">
          <img src="{{ asset('storage/' . $ca->image) }}"
     class="img-fluid rounded-circle border"
     style="width:350px; height:350px; object-fit:cover;"
     alt="{{ $ca->name }}">
                <h5 class="text-center mt-3 mb-3">{{ $ca->name }}</h5>
                <p class="text-center"><a  href="{{ route('shop', ['category' => $ca->id]) }}"class="btn btn-success">Go Shop</a></p>
            </div>