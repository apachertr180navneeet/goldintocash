@extends('admin.layouts.app') 

@section('style')
<style>
    /* Fixed height for all cards */
    .fixed-card {
        height: 200px; /* Adjust this height as needed */
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column; /* Ensure multiple lines stack nicely */
        text-align: center;
    }
</style>
@endsection 

@section('content')

<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row g-3">
        <!-- Customer Management -->
        <div class="col-md-4">
            <div class="card fixed-card">
                <div class="card-body">
                    <h5 class="card-title">Customer Management</h5>
                    <p class="card-text">Total: 50</p>
                </div>
            </div>
        </div>

        <!-- Branch Management -->
        <div class="col-md-4">
            <div class="card fixed-card">
                <div class="card-body">
                    <h5 class="card-title">Branch Management</h5>
                    <p class="card-text">Total: 10</p>
                </div>
            </div>
        </div>

        <!-- Branch User -->
        <div class="col-md-4">
            <div class="card fixed-card">
                <div class="card-body">
                    <h5 class="card-title">Branch User</h5>
                    <p class="card-text">Active: 60</p>
                    <p class="card-text">In-Active: 40</p>
                </div>
            </div>
        </div>

        <!-- Total Loan -->
        <div class="col-md-6">
            <div class="card fixed-card">
                <div class="card-body">
                    <h5 class="card-title">Total Loan</h5>
                    <p class="card-text">Total Pending Application: 20</p>
                    <p class="card-text">Total Application Completed: 50</p>
                </div>
            </div>
        </div>

        <!-- Application Management -->
        <div class="col-md-6">
            <div class="card fixed-card">
                <div class="card-body">
                    <h5 class="card-title">Application Management</h5>
                    <p class="card-text">Total: 50</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@endsection 

@section('script') 
@endsection
