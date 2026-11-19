@extends('adminlayout.adminlayout')
@section('body')

<div class="card-body">
  <h4 class="card-title">Edit Banner</h4>
  <p class="card-description">Modify the banner details below</p>
  <form class="forms-sample" action="{{ route('cat.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="name" value="{{ old('name', $category->name) }}">
    </div>
      <label for="image">Image</label>
      @if($category->image)
        <div class="mb-2"><img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="max-width:150px; height:auto;"></div>
      @endif
      <input type="file" class="form-control" id="image" name="image" value="{{ asset('storage/' . $category->image) }}">
    </div>
    <button type="submit" class="btn btn-primary me-2">Update</button>
    <a href="{{ route('cat.index') }}" class="btn btn-light">Cancel</a>
  </form>
</div>

@endsection