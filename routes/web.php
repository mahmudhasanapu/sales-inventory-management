<?php
use Doctrine\Common\Lexer\Token;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;

use App\Http\Middleware\TokenVerificationMiddleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//Frontend Routes

Route::get('/', [HomeController::class, 'homepage']);
Route::get('/dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboardPage')->middleware(TokenVerificationMiddleware::class);
Route::get('/categoryPage', [CategoryController::class, 'categoryPage'])->name('categoryPage')->middleware(TokenVerificationMiddleware::class);
Route::get('/customerPage', [CustomerController::class, 'customerPage'])->name('customerPage')->middleware(TokenVerificationMiddleware::class);
Route::get('/productPage', [ProductController::class, 'productPage'])->name('productPage')->middleware(TokenVerificationMiddleware::class);
Route::get('/invoicePage', [InvoiceController::class, 'invoicePage'])->name('invoicePage')->middleware(TokenVerificationMiddleware::class);
Route::get('/userRegistration', [UserController::class, 'userRegistrationPage']);
Route::get('/userLogin', [UserController::class, 'userLoginPage']);
Route::get('/resetPassword', [UserController::class, 'resetPasswordPage']);
Route::get('/sendOtp', [UserController::class, 'sendOtpPage']);
Route::get('/verifyOtp', [UserController::class, 'verifyOtpPage']);
Route::get('/userProfile', [UserController::class, 'profilePage']);
Route::get('/salePage',[InvoiceController::class,'SalePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/reportPage',[ReportController::class,'ReportPage'])->middleware([TokenVerificationMiddleware::class]);



//backend
//user Routes API
Route::post('/user-registration', [UserController::class, 'userRegistration'])->name('user-registration');
Route::post('/user-Login', [UserController::class, 'userLogin'])->name('user-login');
Route::get('/user-logout', [UserController::class, 'logout'])->name('logout');
Route::post('/send-otp', [UserController::class, 'sendOTP'])->name('send-otp');
Route::post('/verify-otp', [UserController::class, 'verifyOTP'])->name('send-otp');
Route::post('/reset-password', [UserController::class, 'resetPassword'])->middleware(TokenVerificationMiddleware::class);
Route::get('/user-profile', [UserController::class, 'UserProfile'])->middleware(TokenVerificationMiddleware::class);
Route::post('/user-update', [UserController::class, 'UserProfileUpdate'])->middleware(TokenVerificationMiddleware::class);



//category Routes API
Route::get('/category-list', [CategoryController::class, 'CategoryList'])->middleware(TokenVerificationMiddleware::class);
Route::post('/category-create', [CategoryController::class, 'CategoryCreate'])->middleware(TokenVerificationMiddleware::class);
Route::post("/category-delete",[CategoryController::class,'CategoryDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/category-by-id', [CategoryController::class, 'CategoryById'])->middleware(TokenVerificationMiddleware::class);
Route::post('/category-update', [CategoryController::class, 'CategoryUpdate'])->middleware(TokenVerificationMiddleware::class);


//customer Routes API
Route::post('/customer-create', [CustomerController::class, 'CustomerCreate'])->middleware(TokenVerificationMiddleware::class);
Route::get('/customer-list', [CustomerController::class, 'CustomerList'])->middleware(TokenVerificationMiddleware::class);
Route::post('/customer-delete', [CustomerController::class, 'CustomerDelete'])->middleware(TokenVerificationMiddleware::class);
Route::post('/customer-by-id', [CustomerController::class, 'CustomerById'])->middleware(TokenVerificationMiddleware::class);
Route::post('/customer-update', [CustomerController::class, 'CustomerUpdate'])->middleware(TokenVerificationMiddleware::class);


//product Routes API
Route::post('/create-product', [ProductController::class,'CreateProduct'])->middleware(TokenVerificationMiddleware::class);
Route::get('/product-list', [ProductController::class,'ProductList'])->middleware(TokenVerificationMiddleware::class);
Route::post('/product-by-id', [ProductController::class,'ProductById'])->middleware(TokenVerificationMiddleware::class);
Route::post('/product-delete', [ProductController::class,'ProductDelete'])->middleware(TokenVerificationMiddleware::class);
Route::post('/product-update', [ProductController::class,'ProductUpdate'])->middleware(TokenVerificationMiddleware::class);


//invoice Routes API
Route::post('/invoice-create', [InvoiceController::class,'InvoiceCreate'])->middleware(TokenVerificationMiddleware::class);
Route::get('/invoice-select', [InvoiceController::class,'InvoiceSelect'])->middleware(TokenVerificationMiddleware::class);
Route::post('/invoice-details', [InvoiceController::class,'InvoiceDetails'])->middleware(TokenVerificationMiddleware::class);
Route::post('/invoice-delete', [InvoiceController::class,'InvoiceDelete'])->middleware(TokenVerificationMiddleware::class);




//Dashboard Routes API
Route::get('/summary', [DashboardController::class,'summary'])->middleware(TokenVerificationMiddleware::class);

//Report Routs API
Route::get("/sales-report/{FormDate}/{ToDate}",[ReportController::class,'salesReport'])->middleware([TokenVerificationMiddleware::class]);