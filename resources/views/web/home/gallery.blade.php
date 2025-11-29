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

    <div class="masonry">
      <div class="masonry-item">
        <img src="https://images.unsplash.com/photo-1526779259212-939e64788e3c?auto=format&fit=crop&w=800&q=60" alt="Gallery 1">
        <div class="overlay"><i class="bi bi-eye-fill"></i></div>
      </div>
      <div class="masonry-item">
        <img src="https://images.pexels.com/photos/674010/pexels-photo-674010.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="Gallery 2">
        <div class="overlay"><i class="bi bi-eye-fill"></i></div>
      </div>
      <div class="masonry-item">
        <img src="https://thumbs.dreamstime.com/b/black-young-fashion-model-woman-neon-light-portrait-beautiful-model-fluorescent-make-up-art-design-female-posing-240354611.jpg" alt="Gallery 3">
        <div class="overlay"><i class="bi bi-eye-fill"></i></div>
      </div>
      <div class="masonry-item">
        <img src="https://thumbs.dreamstime.com/b/beautiful-young-girl-25389275.jpg" alt="Gallery 4">
        <div class="overlay"><i class="bi bi-eye-fill"></i></div>
      </div>
      <div class="masonry-item">
        <img src="https://media.istockphoto.com/id/814423752/photo/eye-of-model-with-colorful-art-make-up-close-up.jpg?s=612x612&w=0&k=20&c=l15OdMWjgCKycMMShP8UK94ELVlEGvt7GmB_esHWPYE=" alt="Gallery 5">
        <div class="overlay"><i class="bi bi-eye-fill"></i></div>
      </div>
      <div class="masonry-item">
        <img src="https://images.unsplash.com/photo-1526779259212-939e64788e3c?auto=format&fit=crop&w=800&q=60" alt="Gallery 1">
        <div class="overlay"><i class="bi bi-eye-fill"></i></div>
      </div>
      <div class="masonry-item">
        <img src="https://images.pexels.com/photos/674010/pexels-photo-674010.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="Gallery 2">
        <div class="overlay"><i class="bi bi-eye-fill"></i></div>
      </div>
    </div>
  </div>

  <!-- Lightbox -->
  <div id="lightbox" class="lightbox">
    <img id="lightbox-img" src="" alt="Zoomed Image">
  </div>
</section>
@endsection 

@section('script')
@endsection
