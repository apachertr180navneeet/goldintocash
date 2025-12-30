<!-- Topbar Start -->
<div class="container-fluid bg-steps1 text-white-50 py-2 px-0 d-none d-lg-block">
    <div class="row gx-0 align-items-center text-dark">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="fa fa-phone-alt me-2"></small>
                <small>+91 97979 79812</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="far fa-envelope-open me-2"></small>
                <small>manishsoni5500@gmail.com</small>
            </div>
            {{--  <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="far fa-clock me-2"></small>
                <small>Mon - Fri : 09 AM - 09 PM</small>
            </div>  --}}
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
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
        <img class="img-fluid me-3" src="{{ asset('website/img/logo-1.png') }}" alt="" />
    </a>

    <!-- Mobile Menu Button -->
    <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- ========================= -->
    <!-- OFFCANVAS MOBILE MENU -->
    <!-- ========================= -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" style="width: 300px">
        <div class="offcanvas-header">
            <img src="{{ asset('website/img/logo-1.png') }}" style="width: 20%" alt="" />
            <h6 class="offcanvas-title">Abhushan Into Cash</h6>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">
            <div class="navbar-nav">
                <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link">About Us</a>
                <a href="{{ route('gallery') }}" class="nav-item nav-link">Gallery</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact Us</a>

                <a href="{{ route('quick.enquiry') }}" class="nav-item nav-link btn btn-quick px-3 my-2">
                    Quick Enquiry
                </a>

                <!-- Mobile Only Application Button -->
                <a
                    href="{{ route('application') }}"
                    class="nav-item nav-link btn btn-application px-3 d-block d-lg-none"
                >
                    Application Form
                </a>
            </div>
        </div>
    </div>

    <!-- Desktop Menu -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
            <a href="{{ route('home') }}" 
            class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}">
            Home
            </a>

            <a href="{{ route('about') }}" 
            class="nav-item nav-link {{ Route::is('about') ? 'active' : '' }}">
            About Us
            </a>

            <a href="{{ route('gallery') }}" 
            class="nav-item nav-link {{ Route::is('gallery') ? 'active' : '' }}">
            Gallery
            </a>

            <a href="{{ route('contact') }}" 
            class="nav-item nav-link {{ Route::is('contact') ? 'active' : '' }}">
            Contact Us
            </a>

            <a href="{{ route('quick.enquiry') }}" class="nav-item nav-link btn btn-quick px-3">Quick Enquiry</a>

            <a href="{{ route('application') }}" class="nav-item nav-link btn btn-application px-3 d-block d-lg-none">
                Application Form
            </a>
        </div>
    </div>

    <!-- Desktop Only Application Button -->
    <a href="{{ route('application') }}" class="btn btn-application px-3 d-none d-lg-block"> Application Form </a>
</nav>
<!-- Navbar End -->
