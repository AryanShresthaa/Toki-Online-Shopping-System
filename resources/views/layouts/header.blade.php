<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow bg-white">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo.png') }}"
                 alt="Tokri"
                 style="height:75px; width:auto;">

            <div class="ms-2">
                <h4 class="m-0 text-success fw-bold">TOKRI</h4>
                <small class="text-dark fw-semibold">
                    Sabai Kura, Eutai Tokri Ma
                </small>
            </div>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar -->
        <div class="collapse navbar-collapse" id="templatemo_main_nav">

            <!-- Center Menu -->
            <ul class="navbar-nav mx-auto gap-lg-4">

                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active text-success' : '' }}"
                       href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ request()->routeIs('shop') ? 'active text-success' : '' }}"
                       href="{{ route('shop') }}">
                        Shop
                    </a>
                </li>

            </ul>

            <!-- Right Side -->
            <div class="d-flex align-items-center">

                @php
                    $cartCount = auth()->check()
                        ? \App\Models\Carts::where('user_id', auth()->id())->sum('quantity')
                        : 0;
                @endphp

                <!-- Cart -->
                <a href="{{ route('cart.index') }}"
                   class="nav-icon position-relative text-decoration-none me-4">

                    <i class="fas fa-shopping-cart fa-lg text-dark"></i>

                    @if($cartCount > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $cartCount }}
                        </span>
                    @endif

                </a>

                @auth

                <!-- User Dropdown -->
                <div class="dropdown">

                    <a class="text-decoration-none dropdown-toggle d-flex align-items-center"
                       href="#"
                       data-bs-toggle="dropdown">

                        <i class="fa fa-user-circle fa-lg text-dark"></i>

                        <span class="ms-2 fw-semibold text-dark">
                            {{ Auth::user()->name }}
                        </span>

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        @if(Auth::user()->role == 'admin')
                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>
                                    Admin Dashboard
                                </a>
                            </li>
                        @endif

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('profile.edit') }}">
                                <i class="fas fa-user me-2"></i>
                                Profile
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('orders.index') }}">
                                <i class="fas fa-box me-2"></i>
                                My Orders
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <form method="POST"
                                  action="{{ route('logout') }}">
                                @csrf

                                <button class="dropdown-item"
                                        type="submit">

                                    <i class="fas fa-sign-out-alt me-2"></i>

                                    Logout

                                </button>

                            </form>
                        </li>

                    </ul>

                </div>

                @else

                <a href="{{ route('login') }}"
                   class="btn btn-outline-success me-2">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="btn btn-success">
                    Register
                </a>

                @endauth

            </div>

        </div>

    </div>
</nav>
<!-- End Header -->