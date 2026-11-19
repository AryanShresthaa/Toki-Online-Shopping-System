@extends('adminlayout.adminlayout')

@section('body')
@if(session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif

<div class="card">

    <div class="card-header">
        <h3>All Orders</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            @foreach($orders as $order)

                <tr>

                    <td>#{{ $order->id }}</td>

                    <td>{{ $order->user->name }}</td>

                    <td>{{ $order->phone }}</td>

                    <td>Rs. {{ number_format($order->total,2) }}</td>

                    <td>
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="d-flex align-items-center">
        @csrf
        @method('PUT')

        <select name="status" class="form-select form-select-sm me-2">

            <option value="Pending"
                {{ $order->status == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>
                 <option value="Shipped"
                {{ $order->status == 'Shipped' ? 'selected' : '' }}>
                Shipped
            </option>


            <option value="Delivered"
                {{ $order->status == 'Delivered' ? 'selected' : '' }}>
                Delivered
            </option>

        </select>

        <button type="submit" class="btn btn-success btn-sm">
            Update
        </button>

    </form>
</td>

                    <td>{{ $order->created_at->format('d M Y') }}</td>

                    <td>

                        <a href="{{ route('admin.orders.show',$order->id) }}" class="btn btn-primary btn-sm">
                            View

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection