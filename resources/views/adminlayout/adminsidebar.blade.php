<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
               href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <!-- Banner -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('banner.*') ? 'active' : '' }}"
               href="{{ route('banner.index') }}">
                <i class="mdi mdi-image-multiple menu-icon"></i>
                <span class="menu-title">Banners</span>
            </a>
        </li>

        <!-- Products -->
        <li class="nav-item">

            <a class="nav-link {{ request()->routeIs('product.*') ? 'active' : '' }}"
               data-bs-toggle="collapse"
               href="#productsMenu"
               aria-expanded="{{ request()->routeIs('product.*') ? 'true' : 'false' }}">

                <i class="mdi mdi-package-variant menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>

            </a>

            <div class="collapse {{ request()->routeIs('product.*') ? 'show' : '' }}"
                 id="productsMenu">

                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}"
                           href="{{ route('product.index') }}">
                            View Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('product.create') ? 'active' : '' }}"
                           href="{{ route('product.create') }}">
                            Add Product
                        </a>
                    </li>

                </ul>

            </div>

        </li>

        <!-- Categories -->
        <li class="nav-item">

            <a class="nav-link {{ request()->routeIs('cat.*') ? 'active' : '' }}"
               data-bs-toggle="collapse"
               href="#categoryMenu"
               aria-expanded="{{ request()->routeIs('cat.*') ? 'true' : 'false' }}">

                <i class="mdi mdi-shape-outline menu-icon"></i>
                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>

            </a>

            <div class="collapse {{ request()->routeIs('cat.*') ? 'show' : '' }}"
                 id="categoryMenu">

                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('cat.index') ? 'active' : '' }}"
                           href="{{ route('cat.index') }}">
                            View Categories
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('cat.create') ? 'active' : '' }}"
                           href="{{ route('cat.create') }}">
                            Add Category
                        </a>
                    </li>

                </ul>

            </div>

        </li>

        <!-- Orders -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.orders*') ? 'active' : '' }}"
               href="{{ route('admin.orders') }}">
                <i class="mdi mdi-cart-outline menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>

        <!-- Customers -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.customers*') ? 'active' : '' }}"
               href="{{ route('admin.customers') }}">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Customers</span>
            </a>
        </li>


    </ul>
</nav>