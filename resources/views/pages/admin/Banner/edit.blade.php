@extends('adminlayout.adminlayout')
@section('body')

<div class="card-body">
  <h4 class="card-title">Edit Banner</h4>
  <p class="card-description">Modify the banner details below</p>
  <form class="forms-sample" action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $banner->title) }}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $banner->description) }}">
    </div>

    <label for="description">subtitle</label>
      <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $banner->subtitle) }}">
    </div>
    <div class="form-group">
      <label for="image">Image</label>
      @if($banner->image)
        <div class="mb-2"><img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->name }}" style="max-width:150px; height:auto;"></div>
      @endif
      <input type="file" class="form-control" id="image" name="image" value="{{ asset('storage/' . $banner->image) }}">
    </div>
    <button type="submit" class="btn btn-primary me-2">Update</button>
    <a href="{{ route('banner.index') }}" class="btn btn-light">Cancel</a>
  </form>
</div>

@endsection