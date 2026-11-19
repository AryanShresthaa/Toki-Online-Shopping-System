<!-- Start Footer -->
<footer class="bg-dark text-light mt-5">

    <div class="container py-5">

        <div class="row">

            <!-- Store Info -->
            <div class="col-lg-4 col-md-6 mb-4">

                <h3 class="text-success fw-bold">🛒 Tokri</h3>

                <p class="mt-3">
                    Your trusted online Kirana store. Fresh groceries,
                    snacks, beverages and daily essentials delivered to
                    your doorstep.
                </p>

                <ul class="list-unstyled">

                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt text-success me-2"></i>
                        Kathmandu, Nepal
                    </li>

                    <li class="mb-2">
                        <i class="fas fa-phone text-success me-2"></i>
                        +977-98XXXXXXXX
                    </li>

                    <li>
                        <i class="fas fa-envelope text-success me-2"></i>
                        support@tokri.com
                    </li>

                </ul>

            </div>

            <!-- Quick Links -->
            <div class="col-lg-4 col-md-6 mb-4">

                <h4 class="border-bottom border-secondary pb-2">
                    Quick Links
                </h4>

                <ul class="list-unstyled mt-3">

                    <li class="mb-2">
                        <a href="{{ route('home') }}" class="text-light text-decoration-none">
                            Home
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('shop') }}" class="text-light text-decoration-none">
                            Shop
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('cart.index') }}" class="text-light text-decoration-none">
                            My Cart
                        </a>
                    </li>

                    @auth
                    <li class="mb-2">
                        <a href="{{ route('orders.index') }}" class="text-light text-decoration-none">
                            My Orders
                        </a>
                    </li>
                    @endauth

                </ul>

            </div>

            <!-- Contact -->
            <div class="col-lg-4">

                <h4 class="border-bottom border-secondary pb-2">
                    Stay Connected
                </h4>

                <p class="mt-3">
                    Follow us on social media for the latest offers and discounts.
                </p>

                <div class="mt-3">

                    <a href="#" class="text-light me-3">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>

                    <a href="#" class="text-light me-3">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>

                    <a href="#" class="text-light me-3">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>

                    <a href="#" class="text-light">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

    <div class="bg-black py-3">

        <div class="container text-center">

            <small>
                © {{ date('Y') }} <span class="text-success">Tokri</span>. All Rights Reserved.
            </small>

        </div>

    </div>

</footer>
<!-- End Footer -->