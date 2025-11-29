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
               <h2 class="mb-5 quick-enquiry" style="text-align: center; font-family: 'Tiro Devanagari Hindi', serif;  color: #ffbf16"><span style="color: #000000; ">बैंक में गिरवी सोना—अब बिना झंझट छुड़वाएं!</span><br>
             Free Your Pledged Gold—Simple, Transparent & Quick!</h2>
    <div class="Application-form">
      <h2>Quick Enquiry</h2>
      <form>
        <div class="row d-flex justify-content-center">
        <div class="col-lg-7 mb-3">
          <label class="form-label"><i class="bi bi-person-fill"></i>Name</label>
          <input type="text" class="form-control" placeholder="Name" required>
        </div>

        <div class="col-lg-7 mb-3">
          <label class="form-label"><i class="bi bi-telephone-fill"></i> Phone Number</label>
          <input type="tel" class="form-control" placeholder="+91 98765 43210" required>
        </div>

         <div class="col-lg-7 mb-3">
          <label class="form-label"><i class="bi bi-geo-alt-fill"></i>City</label>
          <input type="text" class="form-control" placeholder="Enter your city" required>
        </div>


        <div class="col-lg-7 mb-3">
          <label class="form-label"><i class="bi bi-gem"></i>Gold Net Weight</label>
          <input type="text" class="form-control" placeholder="e.g. 25.5" required>
        </div>

        <div class="col-lg-7 mb-3">
          <label class="form-label"><i class="fa-solid fa-indian-rupee-sign"></i>Gold Loan Amount</label>
          <input type="text" class="form-control" placeholder="e.g. 75000" required>
        </div>


         <div class="col-lg-7 mb-3">
          <label class="form-label"></label>
                  <button type="submit" class="btn btn-submit w-100">Send Message</button>
        </div>

        </div>
      </form>
      </div>
    </div>
    </div>
  </section>
@endsection 

@section('script')
@endsection
