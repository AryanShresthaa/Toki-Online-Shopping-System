@extends('adminlayout.adminlayout')
@section('body')

<div class="card-body">
  <h4 class="card-title">Edit Banner</h4>
  <p class="card-description">Modify the product details below</p>
  <form class="forms-sample" action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $products->name) }}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $products->description) }}">
    </div>
    <div class="form-group">
    <label for="description">Price</label>
      <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $products->price) }}">
    </div>
     <div class="form-group">
     <label for="description">Quantity</label>
      <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $products->quantity) }}">
    </div>
    <div class="form-group">
    <label for="category">Category</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ $products->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
    <div class="form-group">
      <label for="image">Image</label>
      @if($products->image)
        <div class="mb-2"><img src="{{ asset('storage/' . $products->image) }}" alt="{{ $products->name }}" style="max-width:150px; height:auto;"></div>
      @endif
      <input type="file" class="form-control" id="image" name="image" value="{{ asset('storage/' . $products->image) }}">
    </div>
    <button type="submit" class="btn btn-primary me-2">Update</button>
    <a href="{{ route('product.index') }}" class="btn btn-light">Cancel</a>
  </form>
</div>

@endsection