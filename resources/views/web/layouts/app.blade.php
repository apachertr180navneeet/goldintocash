<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         <meta charset="utf-8">
        <title>Abhushan Into Cash</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('website/img/logo-1.png')}}">

         <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('website/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('website/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('website/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('website/css/style.css')}}" rel="stylesheet">
        @yield('style')
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->
        <a href="https://wa.me/919797979812" class="whatsapp-float" target="_blank" rel="noopener noreferrer">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" />
        </a>

        <a href="tel:919797979812" class="call-button"> 📞 </a>

        @include('web.layouts.elements.header')
        @yield('content')
        @include('web.layouts.elements.footer')



        {{--  Script for Carousel and Lightbox  --}}
        <script>
            const counters = document.querySelectorAll(".count");
            const speed = 80;

            const startCounting = (counter) => {
                const target = +counter.getAttribute("data-target");
                const count = +counter.innerText;
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(() => startCounting(counter), 20);
                } else {
                    counter.innerText = target.toLocaleString();
                }
            };

            const section = document.querySelector(".creative-counter-section");
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    counters.forEach((counter) => startCounting(counter));
                    observer.disconnect();
                }
            });
            observer.observe(section);
        </script>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

        <script src="{{asset('website/lib/wow/wow.min.js')}}"></script> 
        <script src="{{asset('website/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('website/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('website/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('website/lib/counterup/counterup.min.js')}}"></script>
        
        
        <script>
            const track = document.querySelector(".carousel-track");
            const slides = document.querySelectorAll(".slide1");
            const nextBtn = document.querySelector(".next");
            const prevBtn = document.querySelector(".prev");

            let index = 0;
            let slidesToShow = 4;
            const totalSlides = slides.length;

            // Optional: change slidesToShow based on window width
            function updateSlidesToShow() {
                if (window.innerWidth < 768) {
                    slidesToShow = 1; // mobile
                } else {
                    slidesToShow = 4; // desktop
                }
            }
            window.addEventListener("resize", () => {
                updateSlidesToShow();
                updateSlide(); // recalc position on resize
            });
            updateSlidesToShow();

            function updateSlide() {
                const slideWidthPercent = 100 / slidesToShow;
                track.style.transform = `translateX(-${index * slideWidthPercent}%)`;
            }

            nextBtn.addEventListener("click", () => {
                if (index < totalSlides - slidesToShow) {
                    index++;
                } else {
                    index = 0; // last ke baad first
                }
                updateSlide();
            });

            prevBtn.addEventListener("click", () => {
                if (index > 0) {
                    index--;
                } else {
                    index = totalSlides - slidesToShow; // first se last
                }
                updateSlide();
            });

            /* Auto slide optional */
            setInterval(() => {
                nextBtn.click();
            }, 3000);
        </script>
        
        <!-- Template Javascript -->
        <script src="{{asset('website/js/main.js')}}"></script>
        @yield('script')
    </body>
</html>
