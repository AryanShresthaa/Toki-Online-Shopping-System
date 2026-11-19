@extends('adminlayout.adminlayout')
@section('body')
<div class="row">

    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary shadow">
            <div class="card-body">
                <h6>Total Products</h6>
                <h2>{{ $products }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success shadow">
            <div class="card-body">
                <h6>Total Categories</h6>
                <h2>{{ $categories }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning shadow">
            <div class="card-body">
                <h6>Total Orders</h6>
                <h2>{{ $orders }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-white bg-info shadow">
            <div class="card-body">
                <h6>Total Users</h6>
                <h2>{{ $users }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-3 mb-4">
        <div class="card border-left-warning shadow">
            <div class="card-body">
                <h6>Pending Orders</h6>
                <h2>{{ $pendingOrders }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-left-primary shadow">
            <div class="card-body">
                <h6>Shipped</h6>
                <h2>{{ $shippedOrders }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-left-success shadow">
            <div class="card-body">
                <h6>Delivered</h6>
                <h2>{{ $deliveredOrders }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-dark text-white shadow">
            <div class="card-body">
                <h6>Total Revenue</h6>
                <h2>Rs. {{ number_format($revenue,2) }}</h2>
            </div>
        </div>
    </div>

</div>
<div class="row">

    <div class="col-md-6">

        <div class="card shadow">

            <div class="card-header">
                Top Selling Products
            </div>

            <div class="card-body">
                <canvas id="topProductsChart"></canvas>
            </div>

        </div>

    </div>

</div>
<div class="card mt-4 shadow">

    <div class="col-md-6">
    <div class="card-header">
        <h4>Recent Orders</h4>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Order</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

            @foreach($recentOrders as $order)

                <tr>

                    <td>#{{ $order->id }}</td>

                    <td>{{ $order->user->name }}</td>

                    <td>Rs. {{ number_format($order->total,2) }}</td>

                    <td>{{ $order->status }}</td>

                    <td>{{ $order->created_at->format('d M Y') }}</td>

                </tr>

            @endforeach

            </tbody>

        </table>

        <a href="{{ route('admin.orders') }}" class="btn btn-primary">
            View All Orders
        </a>

    </div>

</div>
@endsection
@section('script')
<script>

const ctx = document.getElementById('topProductsChart');

new Chart(ctx, {

    type: 'bar',

    data: {
        labels: @json($productNames),

        datasets: [{
            label: 'Units Sold',
            data: @json($productSales),
          backgroundColor: [
        '#4CAF50', // Green
        '#2196F3', // Blue
        '#FFC107', // Yellow
        '#E91E63', // Pink
        '#9C27B0'  // Purple
    ],

    borderColor: [
        '#388E3C',
        '#1976D2',
        '#FFA000',
        '#C2185B',
        '#7B1FA2'
    ],
            borderWidth: 1
        }]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    

});

</script>

@endsection