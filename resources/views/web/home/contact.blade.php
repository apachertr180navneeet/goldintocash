@extends('web.layouts.app')
@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-4">Contact Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<section class="contact-section my-5">
    <div class="contact-container">
        <div class="contact-box">
            <div class="cont-icon"><i class="fa-solid fa-location-dot"></i></div>
            <h4>Address</h4>
            <p>
                रिलायंस स्मार्ट मार्ट के पास , एयरपोर्ट रोड, जोधपुर ( राजस्थान )
            </p>
        </div>

        <div class="contact-box">
            <div class="cont-icon"><i class="fa-solid fa-phone"></i></div>
            <h4>Phone</h4>
            <p>+91 97979 79812</p>
        </div>

        <div class="contact-box">
            <div class="cont-icon"><i class="fa-solid fa-paper-plane"></i></div>
            <h4>Email</h4>
            <p>manishsoni5500@gmail.com</p>
        </div>
    </div>
</section>

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-6 mb-5">If You Have Any Query, Please Contact Us</h1>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- ✅ Validation error messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>There were some problems with your input:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('contact.post') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" />
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" />
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" />
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 100px;"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label"></label>
                            <button type="submit" class="btn btn-submit w-100">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                <div class="position-relative rounded overflow-hidden h-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3578.003867797518!2d73.03930987541713!3d26.26153787704133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjbCsDE1JzQxLjUiTiA3M8KwMDInMzAuOCJF!5e0!3m2!1sen!2sin!4v1764411299078!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<!-- start branches -->
<section class="branches-section my-5">
    <div class="container">
        <h2>Our Branches</h2>
        <p class="subtitle">Visit your nearest Abhushan Into Cash branch!</p>

        <div class="row g-4 justify-content-center">
            @foreach($branches as $key => $value)
                <div class="col-md-4 col-sm-6 d-flex">
                    <div class="branch-card w-100">
                        <i class="bi bi-geo-alt-fill branch-icon"></i>
                        <h5>{{ $value->name }}</h5>
                        <div class="branch-details">
                            <p><i class="bi bi-geo-alt"></i> {{ $value->location }}</p>
                            <p><i class="bi bi-telephone"></i> {{ $value->phone ?? 'N/A' }}</p>
                            <p><i class="bi bi-envelope"></i> {{ $value->email ?? 'N/A' }}</p>
                            <iframe
                                src="{{ $value->location_url ?? 'N/A' }}"
                                width="100%"
                                height="60%"
                                style="border-radius: 10px;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End branches -->


@endsection
@section('script')

@endsection