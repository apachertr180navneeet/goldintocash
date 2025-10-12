<!-- Topbar Start -->
        <div class="container-fluid bg-steps1 text-white-50 py-2 px-0 d-none d-lg-block">
            <div class="row gx-0 align-items-center text-dark">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <small class="fa fa-phone-alt me-2"></small>
                        <small>+012 345 6789</small>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <small class="far fa-envelope-open me-2"></small>
                        <small>info@example.com</small>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <small class="far fa-clock me-2"></small>
                        <small>Mon - Fri : 09 AM - 09 PM</small>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="h-100 d-inline-flex align-items-center">
                        <a class="text-dark-50 ms-4" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="text-dark-50 ms-4" href=""><i class="fab fa-twitter"></i></a>
                        <a class="text-dark-50 ms-4" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="text-dark-50 ms-4" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                <h1 class="m-0"><img class="img-fluid me-3" src="{{ asset('website/img/logo-1.png') }}" alt="" /></h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link">About Us</a>
                    <a href="{{ route('services') }}" class="nav-item nav-link">Our Services</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link">Contact Us</a>
                </div>
            </div>
            <a href="" class="btn btn-application px-3 d-none d-lg-block">Application form </a>
        </nav>
        <!-- Navbar End -->