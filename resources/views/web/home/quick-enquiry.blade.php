@extends('web.layouts.app') @section('style')
<style>
    .container ul {
        list-style-type: disc;
    }
    .page-content p {
        line-height: 30px;
    }
</style>
@endsection @section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-4">Quick Enquiry</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quick Enquiry</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<section class="container Application-section mb-5">
    <!-- Left side image -->
    <div class="row">
        <!-- Right side form -->
        <div class="col-lg-12 quick-enquiry">
            <h2
                class="mb-5 quick-enquiry"
                style="text-align: center; font-family: &quot;Tiro Devanagari Hindi&quot;, serif; color: #ffbf16"
            >
                <span style="color: #000000">बैंक में गिरवी सोना—अब बिना झंझट छुड़वाएं!</span><br />
                Free Your Pledged Gold—Simple, Transparent & Quick!
            </h2>
            <div class="Application-form">
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
                <h2>Quick Enquiry</h2>
                <form action="{{ route('quick.enquiry.post') }}" method="post">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-3 d-none d-sm-block quick-enquiry">
                            <img src="{{ asset('website/img/gallery1.jpg') }}" alt="" class="img-fluid" />
                            <img src="{{ asset('website/img/gallery1.jpg') }}" alt="" class="img-fluid" />
                        </div>
                        <div class="col-lg-6">
                            <div class="col-lg-12 mb-3">
                                <label class="form-label"><i class="bi bi-person-fill"></i>Name / नाम </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    id="name"
                                    placeholder="Name"
                                    required
                                />
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label"
                                    ><i class="bi bi-telephone-fill"></i> Phone Number / फोन नम्बर</label
                                >
                                <input
                                    type="tel"
                                    class="form-control"
                                    name="phone"
                                    id="phone"
                                    placeholder="+91 98765 43210"
                                    required
                                />
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label"><i class="bi bi-geo-alt-fill"></i>City / शहर </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="city"
                                    id="city"
                                    placeholder="Enter your city"
                                    required
                                />
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label"
                                    ><i class="bi bi-gem"></i>Gold Net Weight / सोने का नेट वजन
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="gold_net_weight"
                                    id="weight"
                                    placeholder="e.g. 25.5"
                                    required
                                />
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label"
                                    ><i class="fa-solid fa-indian-rupee-sign"></i>Gold Loan Amount / सोने का लोन
                                    मूल्य</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    name="gold_loan_amount"
                                    id="amount"
                                    placeholder="e.g. 75000"
                                    required
                                />
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label"></label>
                                <button type="submit" class="btn btn-submit w-100">Send Message</button>
                            </div>

                            <div id="successMsg" style="display: none; color: green; margin-top: 15px">
                                ✅ Enquiry sent successfully!
                            </div>
                        </div>
                        <div class="col-lg-3 d-none d-sm-block quick-enquiry">
                            <img src="{{ asset('website/img/gallery5.jpg') }}" alt="" class="img-fluid" />
                            <img src="{{ asset('website/img/gallery20.jpg') }}" alt="" class="img-fluid" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection @section('script') @endsection
