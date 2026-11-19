@extends('adminlayout.adminlayout')
@section('body')
@if(session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <p class="card-description">


                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Id
                          </th>
                          <th>
                            Title
                          </th>
                          <th>
                            Image
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($category as $c)
                        <tr>
                          <td>
                            {{$c->id}}
                          </td>
                          <td>
                           {{$c->name}}
                          </td>
                          <td>
                          <img src=" {{asset('storage/' . $c->image)}} " alt="i">
                          </td>
                          <td>
   

    <a href="{{ route('cat.edit', $c->id) }}" class="btn btn-warning btn-sm me-1">
        <i class="mdi mdi-pencil"></i> Edit
    </a>

    <a href="{{ route('cat.delete', $c->id) }}"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Are you sure you want to delete this category?')">
        <i class="mdi mdi-delete"></i> Delete
    </a>
</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection