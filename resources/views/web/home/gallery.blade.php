@extends('web.layouts.app')
@section('style')
<style>
    .container ul{
        list-style-type: disc;
    }
    .page-content p{
        line-height: 30px;
    }
</style>
@endsection 

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-4">Gallery</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<section class="gallery-section my-5">
    <div class="container">
        <h2>Our Gallery</h2>
        <p class="subtitle"></p>

        <div class="gallery">
            <img src="{{ asset('website/img/gallery1.jpg') }}" alt="Image 1" class="gallery-img" />
            <img src="{{ asset('website/img/gallery2.jpg') }}" alt="Image 2" class="gallery-img" />
            <img src="{{ asset('website/img/gallery3.jpg') }}" alt="Image 3" class="gallery-img" />
            <img src="{{ asset('website/img/gallery4.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery5.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery6.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery7.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery8.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery9.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery10.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery11.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery12.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery13.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery14.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery15.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery16.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery17.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery18.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery19.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery20.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery21.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery22.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery23.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery24.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery25.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery26.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery27.jpg') }}" alt="Image 4" class="gallery-img" />
            <img src="{{ asset('website/img/gallery28.jpg') }}" alt="Image 4" class="gallery-img" />
            <!-- Add more images as needed -->
        </div>

        <!-- Lightbox overlay -->
        <div id="lightbox" class="lightbox">
            <span class="close">&times;</span>
            <img class="lightbox-img" src="" />
        </div>
    </div>
</section>

@endsection 

@section('script')

<script>
    const galleryImages = document.querySelectorAll(".gallery-img");
    const lightbox = document.getElementById("lightbox");
    const lightboxImg = document.querySelector(".lightbox-img");
    const closeBtn = document.querySelector(".close");

    // Open lightbox on image click
    galleryImages.forEach((img) => {
        img.addEventListener("click", () => {
            lightbox.style.display = "flex";
            lightboxImg.src = img.src;
        });
    });

    // Close lightbox
    closeBtn.addEventListener("click", () => {
        lightbox.style.display = "none";
    });

    // Close when clicking outside the image
    lightbox.addEventListener("click", (e) => {
        if (e.target === lightbox) {
            lightbox.style.display = "none";
        }
    });
</script>
@endsection
