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
                    <p class="card-text">Total: {{ $active_branch_count }}</p>
                </div>
            </div>
        </div>

        <!-- Branch User -->
        <div class="col-md-4">
            <div class="card fixed-card">
                <div class="card-body">
                    <h5 class="card-title">Branch User</h5>
                    <p class="card-text">Active: {{ $active_branch_user_count }}</p>
                    <p class="card-text">In-Active: {{ $inactive_branch_user_count }}</p>
                </div>
            </div>
        </div>

        <!-- Total Loan -->
        <div class="col-md-6">
            <div class="card fixed-card">
                <div class="card-body">
                    <h5 class="card-title">Total Loan</h5>
                    <p class="card-text">Total Pending Application: {{ $pending_goldloan }}</p>
                    <p class="card-text">Total Application Completed: {{ $approved_goldloan }}</p>
                </div>
            </div>
        </div>

        <!-- Application Management -->
        <div class="col-md-6">
            <div class="card fixed-card">
                <div class="card-body">
                    <h5 class="card-title">Application Management</h5>
                    <p class="card-text">Total: {{ $goldloancount }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- WhatsApp Auth Key Setting -->
    <div class="row g-3 mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>WhatsApp API Setting</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.setting.update') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">WhatsApp Auth Key</label>
                            <input type="text" 
                                name="whatsapp_auth_key" 
                                class="form-control @error('whatsapp_auth_key') is-invalid @enderror"
                                value="{{ old('whatsapp_auth_key', $setting->whatsapp_auth_key ?? '') }}"
                                placeholder="Enter WhatsApp Auth Key">

                            @error('whatsapp_auth_key')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save Key</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@endsection 

@section('script') 
@endsection
