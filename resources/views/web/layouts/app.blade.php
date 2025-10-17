<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         <meta charset="utf-8">
        <title>Insure</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('website/img/favicon.ico')}}">

         <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

        @include('web.layouts.elements.header')
        @yield('content')
        @include('web.layouts.elements.footer')



        {{--  Script for Carousel and Lightbox  --}}
        <script>
            // Carousel Logic
            const track = document.querySelector(".carousel-track");
            const slides = Array.from(track.children);
            const prevBtn = document.querySelector(".prev");
            const nextBtn = document.querySelector(".next");
            let index = 0;

            function updateSlide() {
                track.style.transform = `translateX(-${index * 100}%)`;
            }

            nextBtn.addEventListener("click", () => {
                index = (index + 1) % slides.length;
                updateSlide();
            });

            prevBtn.addEventListener("click", () => {
                index = (index - 1 + slides.length) % slides.length;
                updateSlide();
            });

            // Lightbox Logic
            const images = document.querySelectorAll(".carousel-slide img");
            const lightbox = document.getElementById("lightbox");
            const lightboxImg = document.getElementById("lightbox-img");
            const closeBtn = document.querySelector(".close");
            const prevLightbox = document.querySelector(".prev-lightbox");
            const nextLightbox = document.querySelector(".next-lightbox");

            let currentImgIndex = 0;
            const allImages = Array.from(images);

            images.forEach((img, i) => {
                img.addEventListener("click", () => {
                    lightbox.style.display = "flex";
                    lightboxImg.src = img.src;
                    currentImgIndex = i;
                });
            });

            closeBtn.addEventListener("click", () => {
                lightbox.style.display = "none";
            });

            prevLightbox.addEventListener("click", () => {
                currentImgIndex = (currentImgIndex - 1 + allImages.length) % allImages.length;
                lightboxImg.src = allImages[currentImgIndex].src;
            });

            nextLightbox.addEventListener("click", () => {
                currentImgIndex = (currentImgIndex + 1) % allImages.length;
                lightboxImg.src = allImages[currentImgIndex].src;
            });
        </script>
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
        <!-- Template Javascript -->
        <script src="{{asset('website/js/main.js')}}"></script>
        @yield('script')
    </body>
</html>
