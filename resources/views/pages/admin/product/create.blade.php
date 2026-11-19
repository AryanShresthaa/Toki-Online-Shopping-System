@extends('adminlayout.adminlayout')
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

</ul>
</div>
@endif

<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create category</h4>
                  <p class="card-description">
                    Basic form layout
                  </p>
                  <form class="forms-sample" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Title" name="name"> 
                    </div>
                      <div class="form-group">
                      <label for="exampleInputUsername1">Description</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="description" name="description"> 
                    </div>
                      <div class="form-group">
                      <label for="exampleInputUsername1">Price</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="price" name="price"> 
                    </div>
                      <div class="form-group">
                      <label for="exampleInputUsername1">Quantity</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="quantity" name="quantity"> 
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                     <select class="form-control" id="category" name="category_id">
                      <option value="">-- Select Category --</option>

                             @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                 {{ $category->name }}
                                        </option>
                                     @endforeach
                                                </select>
                                            </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Image</label>
                      <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Image" name="image">
                    </div>

                    
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endsection