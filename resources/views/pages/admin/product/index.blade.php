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
                         Name
                          </th>
                          <th>
                            description
                          </th>
                          <th>
                            Image
                          </th>
                            <th>
                            price
                          </th>
                              <th>
                            Quantity
                          </th>
                             <th>
                            Category
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($products as $b)
                        <tr>
                          <td>
                            {{$b->id}}
                          </td>
                          <td>
                           {{$b->name}}
                          </td>
                          <td>
                             {{$b->description}}
                          </td>
                          <td>
                          <img src=" {{asset('storage/' . $b->image)}} " alt="i">
                          </td>
                           <td>
                           {{$b->price}}
                          </td>
                             <td>
                           {{$b->quantity}}
                          </td>
                             <td>
                           {{$b->category_id}}
                          </td>
                          <td>
                         
<a href="{{ route('product.edit', $b->id) }}" class="btn btn-warning btn-sm me-1">
    <i class="mdi mdi-pencil"></i> Edit
</a>

<a href="{{ route('product.delete', $b->id) }}"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Are you sure you want to delete this product?')">
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