@extends('web.layouts.app')
@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-4">Application Form</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Application Form</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<section class="container Application-section mb-5">
    <!-- Left side image -->
    <div class="row">
        <!-- Right side form -->
        <div class="col-lg-12">
            <div class="Application-form">
                <h2>Application Form</h2>
                <!-- ✅ Flash messages for success / error -->
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
                <form action="{{ route('application.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="bi bi-person-fill"></i>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="bi bi-telephone-fill"></i> Phone Number</label>
                            <input type="tel" class="form-control" name="mobile_no" placeholder="+91 98765 43210" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="bi bi-telephone-fill"></i>Family Phone Number</label>
                            <input type="tel" class="form-control" name="family_mobile_no" placeholder="+91 98765 43210" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="bi bi-geo-alt-fill"></i>Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter your full address" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="bi bi-geo-alt-fill"></i>City</label>
                            <input type="text" class="form-control" name="city" placeholder="Enter your city" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="fa-solid fa-building-columns"></i>Bank / Branch</label>
                            <input type="text" class="form-control" name="bank_branch" placeholder="Enter bank name and branch" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="fa-solid fa-building-columns"></i>Bank Account Number</label>
                            <input type="text" class="form-control" name="bank_account_number" placeholder="Enter bank account number" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="fa-solid fa-building-columns"></i>Aadhar Card Number</label>
                            <input type="text" class="form-control" name="addhar_card_number" placeholder="Enter Aadhar card number" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="bi bi-gem"></i>Gold Net Weight</label>
                            <input type="text" class="form-control" name="gold_net_weight" placeholder="e.g. 25.5" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="fa-solid fa-indian-rupee-sign"></i>Gold Loan Amount</label>
                            <input type="text" class="form-control" name="gold_loan_amount" placeholder="e.g. 75000" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="bi bi-card-text"></i>Upload Aadhar Card</label>
                            <input type="file" class="form-control" name="aadhar_card" accept=".jpg,.jpeg,.png,.pdf" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="bi bi-credit-card-2-front"></i>Upload Pan Card</label>
                            <input type="file" class="form-control" name="pan_card" accept=".jpg,.jpeg,.png,.pdf" required />
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><i class="bi bi-file-earmark-text"></i>Upload Loan Slip</label>
                            <input type="file" class="form-control" name="gold_loan_slip" accept=".jpg,.jpeg,.png,.pdf" required />
                        </div>

                        <div class="col-lg-6 mb-3">
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
<script>
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => alert.classList.remove('show'));
    }, 4000);
</script>
@endsection
