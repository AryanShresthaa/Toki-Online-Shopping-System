<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo text-success fw-bold fs-4" href="{{ route('admin.dashboard') }}">
                🛒 Shop Admin
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-store text-success" style="font-size:28px;"></i>
            </a>
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-sort-variant"></span>
            </button>
        </div>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item mr-3">
                <a href="{{ route('home') }}" class="btn btn-outline-success btn-sm">
                    <i class="mdi mdi-web"></i> Visit Website
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" 
                   href="#" 
                   role="button"
                   data-bs-toggle="dropdown" 
                   aria-expanded="false"
                   id="profileDropdown">
                    <i class="mdi mdi-account-circle" style="font-size:32px;"></i>
                    <span class="nav-profile-name ml-2">{{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="mdi mdi-account text-primary"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="mdi mdi-logout text-danger"></i> Logout
                        </button>
                    </form>
                </div>
            </li>

        </ul>
    </div>

</nav>