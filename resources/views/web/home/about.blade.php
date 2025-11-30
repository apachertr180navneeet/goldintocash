@extends('web.layouts.app')
@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-4">About Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="{{ asset('website/img/gold.avif') }}" alt="" style="object-fit: cover;">
                    <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3" style="width: 150px; height: 150px;">
                        <div class="bg-gold d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3">
                            <h1 class="text-dark mb-0">15</h1>
                            <h2 class="text-dark">Years</h2>
                            <h5 class="text-dark mb-0">Experience</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6 mb-5">Your Trusted Partner for Gold Selling & Girvi Gold Release</h1>
                    <p class="fs-5 text-primary mb-4">At Abhushan Into Cash, we believe that gold is more than just a metal — it carries memories, emotions, and value. Whether your gold is girvi in a bank, resting unused at home, or you simply want to turn it into instant cash, we're here to make the entire process simple, transparent, and stress-free.</p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 me-3" src="img/icon/icon-04-primary.png" alt="">
                                <h5 class="mb-0">Trusted & Transparent</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 me-3" src="img/icon/icon-03-primary.png" alt="">
                                <h5 class="mb-0">Fast & Hassle-Free</h5>
                            </div>
                        </div>
                    </div>
                    <p class="mb-4">For 15+ years, we've been helping families, individuals, and businesses get the best value for their gold with complete honesty and trust.</p>
                    <div class="border-top mt-4 pt-4">
                        <div class="d-flex align-items-center">
                            <img class="flex-shrink-0 rounded-circle me-3" src="img/profile.jpg" alt="" >
                            <h5 class="mb-0">Call Us: +91 97979 79812</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<section class="mission-section" style="background-image: url({{ asset('website/img/bgcontact.jpg') }});" >
  <div class="mission-content">
    <h3 class="section-title">
      What <span> We Do</span>
    </h3>

    <p class="mission-subtext">
      We help you sell your gold at the best market value and provide complete assistance in releasing girvi gold from banks with a fast, transparent, and hassle-free process.
    </p>

    <div class="mission-grid">
      <!-- Box 1 -->
      <div class="mission-box">
        <i class="fas fa-allergies"></i>
        <h4>Gold Selling Services</h4>
        <p>
         We offer real-time market prices, instant evaluation, and same-day cash or bank transfer. Our process is designed to be fair, fast, and completely transparent.
        </p>
      </div>

      <!-- Box 2 -->
      <div class="mission-box">
        <i class="fas fa-people-carry"></i>
        <h4>Bank Me Girvi Sona Release Assistance</h4>
        <p>
            If your gold is pledged/girvi in a bank or finance company, we help you:

            <ul>
                <li>Check settlement/closure amount</li>
                <li>Clear the loan</li>
                <li>Release the gold</li>
                <li>And offer the best rate if you wish to sell</li>
            </ul>
            Hum aapka girvi sona tension-free way me chudwate hain.
          
        </p>
        
      </div>

    </div>
  </div>

  <div class="mission-image">
    <img src="{{ asset('website/img/aboutus.jpg') }}" 
         alt="Attica Gold Image">
  </div>
</section>

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px;">
            <h1 class="display-6 mb-5">Meet Our Professional Team Members</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="{{ asset('website/img/team-1.jpg') }}" alt="" />
                    <div class="text-center p-4">
                        <h5>Full Name</h5>
                        <span>Designation</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5>Full Name</h5>
                        <p>Designation</p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="{{ asset('website/img/team-2.jpg') }}" alt="" />
                    <div class="text-center p-4">
                        <h5>Full Name</h5>
                        <span>Designation</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5>Full Name</h5>
                        <p>Designation</p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="{{ asset('website/img/team-3.jpg') }}" alt="" />
                    <div class="text-center p-4">
                        <h5>Full Name</h5>
                        <span>Designation</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5>Full Name</h5>
                        <p>Designation</p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="{{ asset('website/img/team-4.jpg') }}" alt="" />
                    <div class="text-center p-4">
                        <h5>Full Name</h5>
                        <span>Designation</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5>Full Name</h5>
                        <p>Designation</p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-square btn-light m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->


@endsection
@section('script')

@endsection