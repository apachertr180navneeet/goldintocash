<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\{
    GoldLoanController,
    BranchController,
    BranchUserController,
    ReportController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within the "web" middleware group.
|
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/application', [HomeController::class, 'application'])->name('application');
Route::get('/quick-enquiry', [HomeController::class, 'quickEnquiry'])->name('quick.enquiry');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

Route::post('/application-post', [HomeController::class, 'applicationPost'])->name('application.post');
Route::post('/contact-post', [HomeController::class, 'contactPost'])->name('contact.post');
Route::post('/quick-enquiry-post', [HomeController::class, 'quickEnquiryPost'])->name('quick.enquiry.post');


// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {

    // Guest routes (no middleware)
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('login', 'login')->name('login');
        Route::post('login', 'postLogin')->name('login.post');

        Route::get('forget-password', 'showForgetPasswordForm')->name('forget.password.get');
        Route::post('forget-password', 'submitForgetPasswordForm')->name('forget.password.post');

        Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
        Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
    });

    // Authenticated admin routes
    Route::middleware(['admin'])->controller(AdminAuthController::class)->group(function () {
        Route::get('dashboard', 'adminDashboard')->name('dashboard');

        Route::post('setting-update', 'settingUpdate')->name('setting.update');

        Route::get('change-password', 'changePassword')->name('change.password');
        Route::post('update-password', 'updatePassword')->name('update.password');

        Route::get('logout', 'logout')->name('logout');

        Route::get('profile', 'adminProfile')->name('profile');
        Route::post('profile', 'updateAdminProfile')->name('update.profile');


        foreach (['goldLoan','branch','branchUser','report'] as $resource) {
            Route::prefix($resource)->name("$resource.")->group(function () use ($resource) {
                $controller = "App\Http\Controllers\Admin\\" . ucfirst($resource) . "Controller";
                Route::get('/', [$controller, 'index'])->name('index');
                Route::get('all', [$controller, 'getall'])->name('getall');
                Route::post('store', [$controller, 'store'])->name('store');
                Route::post('status', [$controller, 'status'])->name('status');
                Route::delete('delete/{id}', [$controller, 'destroy'])->name('destroy');
                Route::get('get/{id}', [$controller, 'get'])->name('get');
                Route::post('update', [$controller, 'update'])->name('update');


                /**  🔽 Add PDF Route ONLY for Report Controller  */
                if($resource == 'report'){
                    Route::get('pdf/{id}', [$controller, 'pdf'])->name('pdf'); 
                    // URL = /report/pdf/{id}
                    // route() = report.pdf
                }
            });
        }


        Route::get('/branch-users/{branch}', [GoldLoanController::class, 'getUsersByBranch']);

    });

});

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    // Place protected user routes here
});
