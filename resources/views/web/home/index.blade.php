@extends('web.layouts.app') @section('content')

<!-- Carousel Start -->

<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('website/img/banner5.png') }}" alt="Gold to Cash Banner" />

                <div class="carousel-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6"></div>

                            <div class="col-12 col-lg-6">
                                <h1 class="display-3 text-light mb-4 animated slideInDown">
                                    Turn Your Gold Into Instant Cash!
                                </h1>

                                <p class="fs-5 text-light mb-5">
                                    Sell your gold at the best market price with quick, hassle-free payouts.
                                </p>

                                <a href="{{ route('contact') }}" class="btn btn-primary py-3 px-5">Get Cash Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img class="w-100" src="{{ asset('website/img/banner4.png') }}" alt="Transparent Gold Evaluation" />

                <div class="carousel-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <h1 class="display-3 text-light mb-4 animated slideInDown">
                                    Trusted, Transparent, and Hassle-Free
                                </h1>

                                <p class="fs-5 text-light mb-5">
                                    We offer 100% transparent gold evaluation with same-day cash settlements.
                                </p>

                                <a href="{{ route('contact') }}" class="btn btn-primary py-3 px-5">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>

            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>

            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Carousel End -->

<!-- About Start -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <!-- Mobile: Experience box on top -->

                <div class="d-block d-lg-none d-md-none mb-3">
                    <div class="bg-white rounded p-3 text-center" style="width: 100%">
                        <div class="bg-gold rounded p-3">
                            <h1 class="text-dark mb-0">15</h1>

                            <h2 class="text-dark">Years</h2>

                            <h5 class="text-dark mb-0">Experience</h5>
                        </div>
                    </div>
                </div>

                <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px">
                    <img
                        class="year position-absolute h-100 img-fluid"
                        src="{{ asset('website/img/lady1.jpg') }}"
                        alt=""
                        style="object-fit: cover"
                    />

                    <div
                        class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3 d-none d-lg-block d-md-block"
                        style="width: 150px; height: 150px"
                    >
                        <div class="d-flex flex-column justify-content-center text-center bg-gold rounded h-100 p-3">
                            <h1 class="text-dark mb-0">15</h1>

                            <h2 class="text-dark">Years</h2>

                            <h5 class="text-dark mb-0">Experience</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-85">
                    <h1 class="display-6 mb-5">Your Trusted Partner for Turning Gold into Cash</h1>

                    <p class="fs-5 text-primary mb-4">
                        At Abhushan Into Cash, we believe selling your gold should be simple, fair, and worry-free.
                        Whether it’s old jewelry, coins, or bars, our friendly team makes sure you get the best value,
                        transparent evaluation, and instant cash—all with a smile.
                    </p>

                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <img
                                    class="flex-shrink-0 me-3"
                                    src="{{asset('website/img/icon/icon-04-primary.png')}}"
                                    alt=""
                                />

                                <h5 class="mb-0">Trusted & Transparent</h5>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <img
                                    class="flex-shrink-0 me-3"
                                    src="{{asset('website/img/icon/icon-03-primary.png')}}"
                                    alt=""
                                />

                                <h5 class="mb-0">Fast & Hassle-Free</h5>
                            </div>
                        </div>
                    </div>

                    <p class="mb-4">
                        Come visit us or schedule a pickup, and experience why so many trust Abhushan Into Cash for
                        their gold.
                    </p>

                    <div class="border-top mt-4 pt-4">
                        <div class="d-flex align-items-center">
                            {{--
                            <img
                                class="flex-shrink-0 rounded-circle me-3"
                                src="{{asset('website/img/profile.jpg')}}"
                                alt=""
                            />
                            --}}

                            <h5 class="mb-0">Call Us: +91 97979 79812</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About End -->

<section class="sell-steps stats-section">
    <h2>We Buy</h2>

    <div class="steps-wrapper">
        <!-- Step 1 -->
        <div class="step">
            <div class="circle">
                <img src="{{ asset('website/img/icon/gold.png') }}" alt="Gold" />
            </div>
            <span class="step-label">Gold</span>
        </div>

        <!-- Step 2 -->
        <div class="step">
            <div class="circle highlight">
                <img src="{{ asset('website/img/icon/silver.png') }}" alt="Testing" />
            </div>
            <span class="step-label">Silver</span>
        </div>

        <!-- Step 3 -->
        <div class="step">
            <div class="circle">
                <img src="{{ asset('website/img/icon/diamond.png') }}" alt="Cash" />
            </div>
            <span class="step-label">Diamonds</span>
        </div>
    </div>
</section>

<div class="container-fluid">
    <div class="container my-5">
        <img src="{{ asset('website/img/iamge1.png') }}" alt="" class="img-fluid" />
    </div>
</div>

<div class="container-fluid bg-steps">
    <div class="container py-5">
        <div class="header">
            <h1>सोने से कैश तक - सिर्फ 4 आसान स्टेप</h1>
        </div>

        <div class="timeline">
            <div class="timeline-item">
                <div class="icon"><i class="fas fa-lightbulb"></i></div>
                <div class="content">
                    <h3>अपना सोना लाएँ</h3>
                    <p>
                        अपना सोने का गहना, सिक्के या बिस्किट हमारे स्टोर पर लाएँ या घर से सुरक्षित पिक-अप की
                        सुविधा लें।
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="icon"><i class="fas fa-pencil-ruler"></i></div>
                <div class="content">
                    <h3>एक्सपर्ट जाँच</h3>
                    <p>हमारे सर्टिफाइड एक्सपर्ट आधुनिक मशीनों से शुद्धता और वजन की सही जाँच करते हैं।</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="icon"><i class="fas fa-code"></i></div>
                <div class="content">
                    <h3>असली कीमत पाएं</h3>
                    <p>आज के लाइव मार्केट रेट के अनुसार आपको सही कीमत बताई जाती है — कोई छुपा चार्ज नहीं।</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="icon"><i class="fas fa-rocket"></i></div>
                <div class="content">
                    <h3>तुरंत कैश पाएं</h3>
                    <p>ऑफर स्वीकार करें और तुरंत कैश पाएं — तेज, सुरक्षित और बिना झंझट।</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid m-0 p-0">
    <div class="row d-flex align-items-center my-5">
        <div class="col-lg-4">
            <img src="{{ asset('website/img/image2.png') }}" alt="" class="img-fluid" />
        </div>

        <div class="col-lg-4">
             <h1 class="display-6 text-center py-3">
                <span style="color: #ffbf16">Sona Do, Paisa Lo! </span><br />
                Sirf Abhushan Into Cash <br />Ke Sath
            </h1>
        </div>

        <div class="col-lg-4 d-flex justify-content-end">
            <img src="{{ asset('website/img/image3.png') }}" alt="" class="img-fluid" />
        </div>
    </div>
</div>

<!-- CTA SECTION: Release Your Girvi Gold -->

<section class="cta-release">
    <div class="cta-inner">
        <div class="cta-content">
            <div class="eyebrow">Bank Me Girvi Sona?</div>

            <h2 class="cta-title">Release Your <span class="accent">Girvi Gold</span> Today!</h2>

            <p class="cta-sub">Fast • Safe • Stress-free. Hum aapka sona wapas dilwane mein aapke saath hain.</p>

            <div class="cta-actions">
                <a class="btn-phone" href="tel:919797979812" aria-label="Call Abhushan Into Cash">
                    <svg class="phone-icon" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
                        <path
                            fill="currentColor"
                            d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24 11.36 11.36 0 0 0 3.56.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h2.5a1 1 0 0 1 1 1 11.36 11.36 0 0 0 .57 3.56 1 1 0 0 1-.24 1.01l-2.21 2.22z"
                        />
                    </svg>

                    <span class="phone-text">Call Now: +91 97979 99812</span>
                </a>

                <!-- <a class="btn-learn" href="#how-it-works">How it works</a> -->
            </div>
        </div>
    </div>
</section>


<!-- Stats Section Start -->
<div class="container-fluid stats-section">
    <div class="container py-5">
        <div class="row text-center text-white">
            <div class="col-6 col-lg-3 mb-4">
                <h1 class="stats-number counter" data-count="2 " data-plus="+">0</h1>
                <p class="stats-text">BRANCHES</p>
            </div>

            <div class="col-6 col-lg-3 mb-4">
                <h1 class="stats-number counter" data-count="2500" data-plus="+">0</h1>
                <p class="stats-text">HAPPY CUSTOMERS</p>
            </div>

            <div class="col-6 col-lg-3 mb-4">
                <h1 class="stats-number counter" data-count="25" data-plus="+">0</h1>
                <p class="stats-text">AWARDS</p>
            </div>

            <div class="col-6 col-lg-3 mb-4">
                <h1 class="stats-number">
                    <span class="counter" data-count="7" data-plus="+">0</span>
                </h1>
                <p class="stats-text">EXPERIENCE</p>
            </div>
        </div>
    </div>
</div>
<!-- Stats Section End -->

<!-- Features Start -->

<div class="container-xxl pt-5" style="background-image: url({{ asset('website/img/bgcontact.jpg') }})">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="display-6 mb-5">Why Choose Us?</h1>

                <p class="mb-4">
                    Fast, reliable, and transparent, we provide top market prices for your gold, instant cash payouts,
                    and a friendly, hassle-free experience you can trust every time.
                </p>

                <div class="row g-3">
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded h-100 p-3">
                            <div
                                class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
                            >
                                <img
                                    class="align-self-center mb-3"
                                    src="{{ asset('website/img/icon/icon-06-primary.png') }}"
                                    alt=""
                                />

                                <h5 class="mb-0">Best Market Prices</h5>

                                <p>We pay based on real-time gold rates.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                        <div class="bg-light rounded h-100 p-3">
                            <div
                                class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
                            >
                                <img
                                    class="align-self-center mb-3"
                                    src="{{ asset('website/img/icon/icon-03-primary.png') }}"
                                    alt=""
                                />

                                <h5 class="mb-0">Instant Cash</h5>

                                <p>Get your money on the spot, no delays.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                        <div class="bg-light rounded h-100 p-3">
                            <div
                                class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
                            >
                                <img
                                    class="align-self-center mb-3"
                                    src="{{ asset('website/img/icon/icon-04-primary.png') }}"
                                    alt=""
                                />

                                <h5 class="mb-0">Transparent Process</h5>

                                <p>We evaluate in front of you with certified machines.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-light rounded h-100 p-3">
                            <div
                                class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
                            >
                                <img
                                    class="align-self-center mb-3"
                                    src="{{ asset('website/img/icon/icon-07-primary.png') }}"
                                    alt=""
                                />

                                <h5 class="mb-0">Trusted Experts</h5>

                                <p>Years of experience in buying and evaluating gold.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="position-relative rounded overflow-hidden h-100" style="min-height: 100%">
                    <img
                        class="img-fluid"
                        src="{{ asset('website/img/gold-into-cash1.webp') }}"
                        alt=""
                        style="object-fit: cover"
                    />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features End -->

<!-- Service Start -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5">
            <h1 class="display-6">Your Trusted Buyer for Gold, Silver & Diamond Items</h1>

            <h3>Get the best price, on the spot - quick, safe, and hassle-free.</h3>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded h-100 p-3">
                    <div class="d-flex align-items-center mb-4">
                        <div class="service-icon flex-shrink-0 bg-gold2 rounded me-4">
                            <img class="img-fluid" src="{{ asset('website/img/icon/icon-10-light.png') }}" alt="" />
                        </div>

                        <h4 class="mb-0">Cash Against Gold</h4>
                    </div>

                    <p class="mb-4">Sell your gold jewelry or ornaments and walk out with instant cash.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded h-100 p-3">
                    <div class="d-flex align-items-center mb-4">
                        <div class="service-icon flex-shrink-0 bg-gold2 rounded me-4">
                            <img class="img-fluid" src="{{ asset('website/img/icon/icon-01-light.png') }}" alt="" />
                        </div>

                        <h4 class="mb-0">Cash for Silver</h4>
                    </div>

                    <p class="mb-4">Turn your silver items, coins, or utensils into money quickly.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded h-100 p-3">
                    <div class="d-flex align-items-center mb-4">
                        <div class="service-icon flex-shrink-0 bg-gold2 rounded me-4">
                            <img class="img-fluid" src="{{ asset('website/img/icon/icon-05-light.png') }}" alt="" />
                        </div>

                        <h4 class="mb-0">Cash for Diamonds</h4>
                    </div>

                    <p class="mb-4">Get fair value for your diamond jewelry with transparent evaluation.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded h-100 p-3">
                    <div class="d-flex align-items-center mb-4">
                        <div class="service-icon flex-shrink-0 bg-gold2 rounded me-4">
                            <img class="img-fluid" src="{{ asset('website/img/icon/icon-08-light.png') }}" alt="" />
                        </div>

                        <h4 class="mb-0">Cash for Gold & Silver Coins</h4>
                    </div>

                    <p class="mb-4">Exchange your coins at market-best rates, instantly.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service End -->

<!-- Appointment Start -->

<div class="container-fluid appointment my-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container pt-5">
        <h1 class="display-6 text-white mb-5 text-center">
            Get Cash For Your Gold <br />
            Use It For What Matters Most!
        </h1>
        <p class="text-white mb-5 text-center">
            Turn your gold into instant cash to support the moments that matter in life. Whether it's planning
            for the future, securing a new opportunity, or handling urgent needs, we've got you covered!
        </p>

        <div class="row g-5 d-flex align-items-center">
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                <div class="row g-3 mb-5">
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded h-100 p-1">
                            <div
                                class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-1 px-1"
                            >
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <img class="img-fluid" src="{{ asset('website/img/icon/old-age.jpg') }}" alt="" />
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <h5 class="mb-0">Old Age</h5>
                                        <p>
                                            Ensure financial security and enjoy your golden years with peace of
                                            mind.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                        <div class="bg-light rounded h-100 p-1">
                            <div
                                class="bg-white d-flex flex-column justify-content-center text-center rounded py-1 px-1"
                            >
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <img class="img-fluid" src="{{ asset('website/img/icon/new-business.jpg') }}" alt="" />
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <h5 class="mb-0">New Business</h5>
                                        <p>Kickstart your dream business without worrying about funds.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                        <div class="bg-light rounded h-100 p-1">
                            <div
                                class="bg-white d-flex flex-column justify-content-center text-center rounded py-1 px-1"
                            >
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <img class="img-fluid" src="{{ asset('website/img/icon/new-home.jpg') }}" alt="" />
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <h5 class="mb-0">New Home</h5>
                                        <p>Make your dream home a reality with a quick cash boost.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-light rounded h-100 p-1">
                            <div
                                class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-1 px-1"
                            >
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <img class="img-fluid" src="{{ asset('website/img/icon/education.jpg') }}" alt="" />
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <h5 class="mb-0">Education</h5>
                                        <p>Invest in your or your child's future with ease.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-light rounded h-100 p-1">
                            <div
                                class="bg-white d-flex flex-column justify-content-center align-items-center text-center rounded h-100 py-1 px-1"
                            >
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-4 col-12">
                                        <img class="img-fluid" src="{{ asset('website/img/icon/emergency.jpg') }}" alt="" />
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <h5 class="mb-0">Emergency</h5>
                                        <p>Cover unexpected expenses instantly, no hassle, no delay.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded p-3">
                    <div class="d-flex align-items-center bg-primary rounded p-3">
                        <!-- <img class="flex-shrink-0 rounded-circle me-3" src="{{ asset('website/img/profile.jpg') }}" alt="" > -->
                        <h5 class="text-white mb-0 number">Call Us: +91 97979 79812</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="" style="" ;>
                    <img class="img-fluid" src="{{ asset('website/img/dd.png') }}" alt="" style="object-fit: cover" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Appointment End -->

<!-- Testimonial Start -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
            <h1 class="display-6 mb-5">Feedback From Our Valued Clients</h1>
        </div>
        <div class="row g-5 d-flex justify-content-center">
            <div class="col-lg-10 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('website/img/icon/review.jpg') }}" alt="" />
                        <p class="fs-5">
                            Number 1 gold buyer in jodhpur i get my gold best price at abhushan into cash also
                            staff is too helpful for me
                        </p>
                        <h5>Hemant Gehlot</h5>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('website/img/icon/review.jpg') }}" alt="" />
                        <p class="fs-5">
                            He got my gold released from the bank. I got the best rate in jodhpur.
                        </p>
                        <h5>Harsh Solanki</h5>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('website/img/icon/review.jpg') }}" alt="" />
                        <p class="fs-5">
                            I got the best rate in Jodhpur. He got my gold released from the bank. I liked the
                            behavior of the sir.
                        </p>
                        <h5>Teena Solanki</h5>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('website/img/icon/review.jpg') }}" alt="" />
                        <p class="fs-5">
                            I've come from Banda, I've been there once before, and they gave me a good price for
                            gold. Thank you, sir.
                        </p>
                        <h5>ARJUN CHOUHAN</h5>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('website/img/icon/review.jpg') }}" alt="" />
                        <p class="fs-5">I'm from Balesar, and they gave me a very good rate. Thank you, sir.</p>
                        <h5>Suresh Suthar</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial End -->

 <div class="container-xxl py-5">
    <div class="container-fluid">
        <div class="text-center mx-auto" style="max-width: 500px">
            <h1 class="display-6 mb-5">Customer Gold Release With Photos</h1>
        </div>
        <div class="carousel-section">
            <div class="carousel-container">
                <button class="nav prev">&#10094;</button>

                <div class="carousel-track">
                    <div class="slide1"><img src="{{ asset('website/img/gallery1.jpg') }}" alt="" /></div>
                    <div class="slide1"><img src="{{ asset('website/img/gallery2.jpg') }}" alt="" /></div>
                    <div class="slide1"><img src="{{ asset('website/img/gallery3.jpg') }}" alt="" /></div>
                    <div class="slide1"><img src="{{ asset('website/img/gallery4.jpg') }}" alt="" /></div>
                    <div class="slide1"><img src="{{ asset('website/img/gallery5.jpg') }}" alt="" /></div>
                    <div class="slide1"><img src="{{ asset('website/img/gallery6.jpg') }}" alt="" /></div>
                    <div class="slide1"><img src="{{ asset('website/img/gallery7.jpg') }}" alt="" /></div>
                    <div class="slide1"><img src="{{ asset('website/img/gallery8.jpg') }}" alt="" /></div>
                    <div class="slide1"><img src="{{ asset('website/img/gallery9.jpg') }}" alt="" /></div>
                    <div class="slide1"><img src="{{ asset('website/img/gallery10.jpg') }}" alt="" /></div>
                </div>

                <button class="nav next">&#10095;</button>
            </div>
        </div>
    </div>
</div>

<div
            class="container-xxl pt-5"
            style="
                background: radial-gradient(1200px 600px at 10% 20%, rgba(255, 248, 230, 0.9), transparent 20%),
                    linear-gradient(180deg, #fff7e3 0%, #f7e2a8 30%, #eecf6e 60%, #d6a93d 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 0px;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            "
        >
            <div class="container">
                <div class="row banner d-flex align-items-center">
                    <div class="col-lg-6 left">
                        <div class="character-wrap">
                            <!-- Replace assets/character.png with your high-res character (transparent PNG or JPG). -->
                            <div class="character">
                                <img src="{{ asset('website/img/gold-women1.png') }}" alt="character placeholder" />
                            </div>
                            <div class="particles" aria-hidden="true">
                                <!-- decorative gold glows -->
                                <span
                                    class="particle"
                                    style="
                                        width: 26px;
                                        height: 26px;
                                        background: rgba(255, 247, 200, 0.95);
                                        left: 10%;
                                        top: 12%;
                                        transform: translate(-50%, -50%);
                                        filter: blur(6px);
                                    "
                                ></span>
                                <span
                                    class="particle"
                                    style="
                                        width: 50px;
                                        height: 50px;
                                        background: rgba(255, 230, 160, 0.95);
                                        left: 32%;
                                        top: 70%;
                                        transform: translate(-50%, -50%);
                                        filter: blur(16px);
                                    "
                                ></span>
                                <span
                                    class="particle"
                                    style="
                                        width: 18px;
                                        height: 18px;
                                        background: rgba(255, 245, 200, 0.9);
                                        left: 78%;
                                        top: 40%;
                                        transform: translate(-50%, -50%);
                                        filter: blur(8px);
                                    "
                                ></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 card" role="region" aria-label="Gold to Cash">
                        <div class="badge">
                            <svg
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M12 2C13 2 14 2.5 14.6 3.4C15.2 4.3 16 6 16 7.5C16 9 14.5 10 13 10H11C9.5 10 8 9 8 7.5C8 6 8.8 4.3 9.4 3.4C10 2.5 11 2 12 2Z"
                                    fill="#f3c66a"
                                />
                            </svg>
                            Abhushan Into Cash
                        </div>

                        <h1 class="headline">अभी तक सोच ही रहे हो?</h1>

                        <p class="sub">टेंशन मत लो — सोना आपका है, <br />हम बस उसे वापस दिलाने में मदद करते हैं।</p>

                        <a class="cta" href="{{ route('application') }}">Get Instant Cash</a>
                    </div>
                </div>
            </div>
        </div>

@endsection 
@section('script') 
     <script>
        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll(".counter");
            const speed = 200;

            const startCounter = (counter) => {
                const target = counter.getAttribute("data-count");
                const plus = counter.getAttribute("data-plus") || "";
                const isDecimal = target.includes(".");
                const targetNum = parseFloat(target);
                let count = 0;

                const update = () => {
                    const increment = targetNum / speed;
                    count += increment;

                    if (count < targetNum) {
                        const value = isDecimal ? count.toFixed(1) : Math.floor(count);
                        counter.innerText = value + plus;
                        requestAnimationFrame(update);
                    } else {
                        counter.innerText = target + plus;
                    }
                };
                update();
            };

            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            startCounter(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.5 }
            );

            counters.forEach((counter) => observer.observe(counter));
        });
    </script>
@endsection
