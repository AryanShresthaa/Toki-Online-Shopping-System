@extends('adminlayout.adminlayout')

@section('body')

<div class="card">

    <div class="card-header">
        <h3>Customers</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Total Orders</th>
                    <th>Joined</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

            @foreach($customers as $customer)

                <tr>

                    <td>{{ $customer->id }}</td>

                    <td>{{ $customer->name }}</td>

                    <td>{{ $customer->email }}</td>

                    <td>{{ $customer->orders->count() }}</td>

                    <td>{{ $customer->created_at->format('d M Y') }}</td>

                    <td>

                        <a href="{{ route('admin.customers.show',$customer->id) }}"
                           class="btn btn-primary btn-sm">

                            View

                        </a>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection