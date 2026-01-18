@extends('web.layouts.app')

@section('style')
<style>
    .container ul {
        list-style-type: disc;
    }

    .page-content p {
        line-height: 30px;
    }

    /* ================= GALLERY ================= */
    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); /* DESKTOP SAME AS BEFORE */
        gap: 20px;
        margin-top: 30px;
    }

    .gallery-img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        border-radius: 12px;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-img:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    /* ================= MOBILE (2 IMAGES PER ROW) ================= */
    @media (max-width: 576px) {
        .gallery {
            grid-template-columns: repeat(2, 1fr); /* MOBILE 2 IMAGES */
            gap: 12px;
        }

        .gallery-img {
            height: 160px;
        }
    }

    /* ================= LIGHTBOX ================= */
    .lightbox {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.85);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .lightbox-img {
        max-width: 90%;
        max-height: 90%;
        border-radius: 10px;
    }

    .close {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 40px;
        color: #fff;
        cursor: pointer;
        font-weight: bold;
    }
</style>
@endsection

@section('content')

<!-- ================= PAGE HEADER ================= -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn">
    <div class="container py-5">
        <h1 class="display-4 mb-4">Gallery</h1>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Gallery</li>
        </ol>
    </div>
</div>

<!-- ================= GALLERY ================= -->
<section class="gallery-section my-5">
    <div class="container">
        <h2>Our Gallery</h2>

        <div class="gallery">
            @for ($i = 1; $i <= 28; $i++)
                <img src="{{ asset('website/img/gallery'.$i.'.jpg') }}" class="gallery-img">
            @endfor
        </div>

        <!-- ================= LIGHTBOX ================= -->
        <div id="lightbox" class="lightbox">
            <span class="close">&times;</span>
            <img class="lightbox-img">
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    const images = document.querySelectorAll('.gallery-img');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.querySelector('.lightbox-img');
    const closeBtn = document.querySelector('.close');

    images.forEach(img => {
        img.addEventListener('click', () => {
            lightbox.style.display = 'flex';
            lightboxImg.src = img.src;
        });
    });

    closeBtn.addEventListener('click', () => {
        lightbox.style.display = 'none';
    });

    lightbox.addEventListener('click', e => {
        if (e.target === lightbox) {
            lightbox.style.display = 'none';
        }
    });
</script>
@endsection
