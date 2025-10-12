@extends('web.layouts.app')
@section('content')


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
                                <a href="#" class="btn btn-primary py-3 px-5">Get Cash Now</a>
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
                                <a href="#" class="btn btn-primary py-3 px-5">More Details</a>
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
                <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="{{ asset('website/img/lady.jpg') }}" alt="" style="object-fit: cover;" />
                    <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3" style="width: 200px; height: 200px;">
                        <div class="d-flex flex-column justify-content-center text-center bg-gold rounded h-100 p-3">
                            <h1 class="text-dark mb-0">25</h1>
                            <h2 class="text-dark">Years</h2>
                            <h5 class="text-dark mb-0">Experience</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6 mb-5">Your Trusted Partner for Turning Gold into Cash</h1>
                    <p class="fs-5 text-primary mb-4">
                        At Abhushan Into Cash, we believe selling your gold should be simple, fair, and worry-free. Whether it’s old jewelry, coins, or bars, our friendly team makes sure you get the best value, transparent
                        evaluation, and instant cash—all with a smile.
                    </p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 me-3" src="{{ asset('website/img/icon/icon-04-primary.png') }}" alt="" />
                                <h5 class="mb-0">Trusted & Transparent</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 me-3" src="{{ asset('website/img/icon/icon-03-primary.png') }}" alt="" />
                                <h5 class="mb-0">Fast & Hassle-Free</h5>
                            </div>
                        </div>
                    </div>
                    <p class="mb-4">Come visit us or schedule a pickup, and experience why so many trust Abhushan Into Cash for their gold.</p>
                    <div class="border-top mt-4 pt-4">
                        <div class="d-flex align-items-center">
                            <img class="flex-shrink-0 rounded-circle me-3" src="{{ asset('website/img/profile.jpg') }}" alt="" />
                            <h5 class="mb-0">Call Us: +012 345 6789</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
<div class="container-fluid">
    <div class="container my-5">
        <img src="{{ asset('website/img/iamge1.png') }}" alt="" class="img-fluid" />
    </div>
</div>

<div class="container-fluid bg-steps">
    <div class="container py-5">
        <div class="header">
            <h1>From Gold to Cash in 4 Simple Steps</h1>
        </div>

        <div class="timeline">
            <div class="timeline-item">
                <div class="icon"><i class="fas fa-lightbulb"></i></div>
                <div class="content">
                    <h3>Bring Your Treasure</h3>
                    <p>Bring your gold jewelry, coins, or bars to our store—or request a safe pickup from your home.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="icon"><i class="fas fa-pencil-ruler"></i></div>
                <div class="content">
                    <h3>Expert Check-Up</h3>
                    <p>Our certified experts evaluate purity and weight with precision using advanced machines.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="icon"><i class="fas fa-code"></i></div>
                <div class="content">
                    <h3>Get Your True Value</h3>
                    <p>Receive a transparent, real-time price offer based on the latest market rates—no hidden fees.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="icon"><i class="fas fa-rocket"></i></div>
                <div class="content">
                    <h3>Receive Instant Cash</h3>
                    <p>Accept the offer and get instant cash in your hands—fast, secure, and hassle-free!</p>
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
                <span style="color: #ffbf16;">Sona Do, Paisa Lo! </span><br />
                Sirf Abhushan Into Cash Ke Sath
            </h1>
        </div>
        <div class="col-lg-4 d-flex justify-content-end">
            <img src="{{ asset('website/img/image3.png') }}" alt="" class="img-fluid" />
        </div>
    </div>
</div>

<section class="creative-counter-section">
    <div class="container">
        <div class="row d-flex justify-content-center" style="gap: 30px;">
            <div class="col-lg-5 col-5 counter-box">
                <div class="icon"><i class="fas fa-store"></i></div>
                <h2 class="count" data-target="200">0</h2>
                <p>Branches</p>
            </div>

            <div class="col-lg-5 col-5 counter-box">
                <div class="icon"><i class="fas fa-smile-beam"></i></div>
                <h2 class="count" data-target="500000">0</h2>
                <p>Happy Customers</p>
            </div>

            <div class="col-lg-5 col-5 counter-box">
                <div class="icon"><i class="fas fa-award"></i></div>
                <h2 class="count" data-target="150">0</h2>
                <p>Awards Won</p>
            </div>

            <div class="col-lg-5 col-5 counter-box">
                <div class="icon"><i class="fas fa-clock"></i></div>
                <h2 class="count" data-target="90">0</h2>
                <p>Years of Experience</p>
            </div>
        </div>
    </div>
</section>
<!-- Facts End -->

<!-- Features Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="display-6 mb-5">Why Choose Us?</h1>
                <p class="mb-4">Fast, reliable, and transparent, we provide top market prices for your gold, instant cash payouts, and a friendly, hassle-free experience you can trust every time.</p>
                <div class="row g-3">
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded h-100 p-3">
                            <div class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                <img class="align-self-center mb-3" src="{{ asset('website/img/icon/icon-06-primary.png') }}" alt="" />
                                <h5 class="mb-0">Best Market Prices</h5>
                                <p>We pay based on real-time gold rates.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                        <div class="bg-light rounded h-100 p-3">
                            <div class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3">
                                <img class="align-self-center mb-3" src="{{ asset('website/img/icon/icon-03-primary.png') }}" alt="" />
                                <h5 class="mb-0">Instant Cash</h5>
                                <p>Get your money on the spot, no delays.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                        <div class="bg-light rounded h-100 p-3">
                            <div class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3">
                                <img class="align-self-center mb-3" src="{{ asset('website/img/icon/icon-04-primary.png') }}" alt="" />
                                <h5 class="mb-0">Transparent Process</h5>
                                <p>We evaluate in front of you with certified machines.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-light rounded h-100 p-3">
                            <div class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                <img class="align-self-center mb-3" src="{{ asset('website/img/icon/icon-07-primary.png') }}" alt="" />
                                <h5 class="mb-0">Trusted Experts</h5>
                                <p>Years of experience in buying and evaluating gold.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="position-relative rounded overflow-hidden h-100" style="min-height: 700px;">
                    <img class="position-absolute img-fluid" src="{{ asset('website/img/gold-into-cash1.webp') }}" alt="" style="object-fit: cover;" />
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
            <h3>Get the best price, on the spot – quick, safe, and hassle-free.</h3>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded h-100 p-3">
                    <div class="d-flex align-items-center ms-n3 mb-4">
                        <div class="service-icon flex-shrink-0 bg-gold2 rounded-end me-4">
                            <img class="img-fluid" src="{{ asset('website/img/icon/icon-10-light.png') }}" alt="" />
                        </div>
                        <h4 class="mb-0">Cash Against Gold</h4>
                    </div>
                    <p class="mb-4">Sell your gold jewelry or ornaments and walk out with instant cash.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded h-100 p-3">
                    <div class="d-flex align-items-center ms-n3 mb-4">
                        <div class="service-icon flex-shrink-0 bg-gold2 rounded-end me-4">
                            <img class="img-fluid" src="{{ asset('website/img/icon/icon-01-light.png') }}" alt="" />
                        </div>
                        <h4 class="mb-0">Cash for Silver</h4>
                    </div>
                    <p class="mb-4">Turn your silver items, coins, or utensils into money quickly.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded h-100 p-3">
                    <div class="d-flex align-items-center ms-n3 mb-4">
                        <div class="service-icon flex-shrink-0 bg-gold2 rounded-end me-4">
                            <img class="img-fluid" src="{{ asset('website/img/icon/icon-05-light.png') }}" alt="" />
                        </div>
                        <h4 class="mb-0">Cash for Diamonds</h4>
                    </div>
                    <p class="mb-4">Get fair value for your diamond jewelry with transparent evaluation.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded h-100 p-3">
                    <div class="d-flex align-items-center ms-n3 mb-4">
                        <div class="service-icon flex-shrink-0 bg-gold2 rounded-end me-4">
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
<div class="container-fluid appointment my-5 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-6 text-white mb-5 text-center">
            Get Cash For Your Gold <br />
            Use It For What Matters Most!
        </h1>
        <p class="text-white mb-5 text-center">
            Turn your gold into instant cash to support the moments that matter in life. Whether it's planning for the future, securing a new opportunity, or handling urgent needs, we've got you covered!
        </p>

        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="row g-3 mb-5">
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded h-100 p-1">
                            <div class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-1 px-1">
                                <h5 class="mb-0">Old Age</h5>
                                <p>Ensure financial security and enjoy your golden years with peace of mind.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                        <div class="bg-light rounded h-100 p-1">
                            <div class="bg-white d-flex flex-column justify-content-center text-center rounded py-1 px-1">
                                <h5 class="mb-0">New Business</h5>
                                <p>Kickstart your dream business without worrying about funds.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                        <div class="bg-light rounded h-100 p-1">
                            <div class="bg-white d-flex flex-column justify-content-center text-center rounded py-1 px-1">
                                <h5 class="mb-0">New Home</h5>
                                <p>Make your dream home a reality with a quick cash boost.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-light rounded h-100 p-1">
                            <div class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-1 px-1">
                                <h5 class="mb-0">Education</h5>
                                <p>Invest in your or your child’s future with ease.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-light rounded h-100 p-1">
                            <div class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-1 px-1">
                                <h5 class="mb-0">Emergency</h5>
                                <p>Cover unexpected expenses instantly, no hassle, no delay.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded p-3">
                    <div class="d-flex align-items-center bg-primary rounded p-3">
                        <img class="flex-shrink-0 rounded-circle me-3" src="{{ asset('website/img/profile.jpg') }}" alt="" />
                        <h5 class="text-white mb-0">Call Us: +012 345 6789</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white rounded p-5">
                    <form>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="gname" placeholder="Name" />
                                    <label for="gname">Name</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cname" placeholder="Mobile" />
                                    <label for="cname">Mobile</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cage" placeholder="City" />
                                    <label for="cage">City</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cage" placeholder="City" />
                                    <label for="cage">Gold Net Weight</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cage" placeholder="City" />
                                    <label for="cage">Gold Loan Amount</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px;">
            <h1 class="display-6 mb-5">Feedback From Our Valued Clients</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="testimonial-left h-100">
                    <img class="img-fluid animated pulse infinite" src="{{ asset('website/img/testimonial-1.jpg') }}" alt="" />
                    <img class="img-fluid animated pulse infinite" src="{{ asset('website/img/testimonial-2.jpg') }}" alt="" />
                    <img class="img-fluid animated pulse infinite" src="{{ asset('website/img/testimonial-3.jpg') }}" alt="" />
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('website/img/testimonial-1.jpg') }}" alt="" />
                        <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.</p>
                        <h5>Client Name</h5>
                        <span>Profession</span>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('website/img/testimonial-2.jpg') }}" alt="" />
                        <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.</p>
                        <h5>Client Name</h5>
                        <span>Profession</span>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="img-fluid rounded mx-auto mb-4" src="{{ asset('website/img/testimonial-3.jpg') }}" alt="" />
                        <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.</p>
                        <h5>Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <div class="testimonial-right h-100">
                    <img class="img-fluid animated pulse infinite" src="{{ asset('website/img/testimonial-1.jpg') }}" alt="" />
                    <img class="img-fluid animated pulse infinite" src="{{ asset('website/img/testimonial-2.jpg') }}" alt="" />
                    <img class="img-fluid animated pulse infinite" src="{{ asset('website/img/testimonial-3.jpg') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
<div class="container-xxl py-5">
    <div class="container-fluid">
        <div class="text-center mx-auto" style="max-width: 500px;">
            <h1 class="display-6 mb-5">Our Gallery</h1>
        </div>
        <div class="carousel">
            <button class="carousel-btn prev">&#10094;</button>
            <div class="carousel-track">
                <!-- Slide 1 -->
                <div class="carousel-slide">
                    <img src="https://picsum.photos/id/1011/600/400" class="big" alt="" />
                    <img src="https://picsum.photos/id/1012/600/400" class="medium" alt="" />
                    <img src="https://picsum.photos/id/1013/600/400" class="small" alt="" />
                    <img src="https://picsum.photos/id/1014/600/400" class="small" alt="" />
                    <img src="https://picsum.photos/id/1015/600/400" class="medium" alt="" />
                </div>

                <!-- Slide 2 -->
                <div class="carousel-slide">
                    <img src="https://picsum.photos/id/1020/600/400" class="big" alt="" />
                    <img src="https://picsum.photos/id/1021/600/400" class="small" alt="" />
                    <img src="https://picsum.photos/id/1022/600/400" class="medium" alt="" />
                    <img src="https://picsum.photos/id/1023/600/400" class="small" alt="" />
                    <img src="https://picsum.photos/id/1024/600/400" class="medium" alt="" />
                </div>
            </div>
            <button class="carousel-btn next">&#10095;</button>
        </div>

        <!-- Lightbox -->
        <div id="lightbox" class="lightbox">
            <span class="close">&times;</span>
            <button class="lightbox-btn prev-lightbox">&#10094;</button>
            <img id="lightbox-img" src="" />
            <button class="lightbox-btn next-lightbox">&#10095;</button>
        </div>
    </div>
</div>

<div
    class="container-xxl py-5"
    style="
        background: radial-gradient(1200px 600px at 10% 20%, rgba(255, 248, 230, 0.9), transparent 20%), linear-gradient(180deg, #fff7e3 0%, #f7e2a8 30%, #eecf6e 60%, #d6a93d 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    "
>
    <div class="container">
        <div class="row banner">
            <div class="col-lg-6 left">
                <div class="character-wrap">
                    <!-- Replace assets/character.png with your high-res character (transparent PNG or JPG). -->
                    <div class="character">
                        <img src="{{ asset('website/img/gold-women.png') }}" alt="character placeholder" />
                    </div>
                    <div class="particles" aria-hidden="true">
                        <!-- decorative gold glows -->
                        <span class="particle" style="width: 26px; height: 26px; background: rgba(255, 247, 200, 0.95); left: 10%; top: 12%; transform: translate(-50%, -50%); filter: blur(6px);"></span>
                        <span class="particle" style="width: 50px; height: 50px; background: rgba(255, 230, 160, 0.95); left: 32%; top: 70%; transform: translate(-50%, -50%); filter: blur(16px);"></span>
                        <span class="particle" style="width: 18px; height: 18px; background: rgba(255, 245, 200, 0.9); left: 78%; top: 40%; transform: translate(-50%, -50%); filter: blur(8px);"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 card" role="region" aria-label="Gold to Cash">
                <div class="badge">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C13 2 14 2.5 14.6 3.4C15.2 4.3 16 6 16 7.5C16 9 14.5 10 13 10H11C9.5 10 8 9 8 7.5C8 6 8.8 4.3 9.4 3.4C10 2.5 11 2 12 2Z" fill="#f3c66a" />
                    </svg>
                    Abhushan Into Cash
                </div>

                <h1 class="headline">Abhi Tak Soch Hi Rahe Ho?</h1>

                <p class="sub">Jaldi Se Aao Aur Apna Cash Le Jaao — Abhushan ke saath Gold Ki Keemat Abhi Ke Abhi Paao!</p>

                <a class="cta" href="#">Get Instant Cash</a>
            </div>
        </div>
    </div>
</div>




@endsection
@section('script')

@endsection