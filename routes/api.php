<?php

use App\Http\Middleware\CheckStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Seller\Links\Links;
use App\Http\Controllers\Api\items\ItemController;
use App\Http\Controllers\Api\front\FrontController;
use App\Http\Controllers\Api\Webpages\WebController;
use App\Http\Controllers\Api\Stripe\StripeController;
use App\Http\Controllers\Api\NFC\NfcRequestController;
use App\Http\Controllers\Table\DatabaseManageController;
use App\Http\Controllers\Api\Seller\Guest\GuestController;
use App\Http\Controllers\Api\Barber\Profile\BarberController;
use App\Http\Controllers\Api\Customer\Profile\ProfileController;
use App\Http\Controllers\Api\Seller\Services\ServicesController;
use App\Http\Controllers\Api\Seller\Authorization\AuthController;
use App\Http\Controllers\Api\Customer\Guest\CustomerGuestController;
use App\Http\Controllers\Api\Customer\Order\CustomerOrderController;
use App\Http\Controllers\Api\Seller\Authorization\ChangePasswordController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
////////Admin Auth Api//////////////////////
Route::prefix('/seller')->group(function () {
    Route::post('/register', [GuestController::class, 'register']);
    Route::post('/login', [GuestController::class, 'login']);
    Route::group(['middleware' =>[ 'auth:sellerServiceApi', 'checkstatus']], function () {
        ////Seller Profile Routes////
        Route::post('/update-basic-detail', [AuthController::class, 'updateBasicDetail']);
        Route::post('/update-seller-profile', [AuthController::class, 'updateSellerProfile']);
        Route::get('/check-stripe-status', [AuthController::class, 'checkStripeStatus']);
        ////Services Routes////
        Route::get('/get-all-services', [ServicesController::class, 'servicesList']);
        Route::post('/add-service', [ServicesController::class, 'addService']);
        Route::delete('/delete-service/{id}', [ServicesController::class, 'deleteService']);
        ////Seller Links Routes////
        Route::post('/create-link', [Links::class, 'createLink']);
        Route::get('/get-links-list', [Links::class, 'getLinksList']);
        Route::post('/attach-product-with-links', [Links::class, 'attachProductWithLinks']);
        Route::post('/delete-service-from-link', [Links::class, 'deleteServiceFromLink']);
        Route::post('/delete-seller-link', [Links::class, 'deleteSellerLink']);
        Route::post('/social-link', [BarberController::class, 'barber_profile']);
        Route::get('/profile-show', [BarberController::class, 'barber_data']);
        Route::get('/get-profile-data', [BarberController::class, 'get_profile_data']);
        Route::post('/update_profile_data', [BarberController::class, 'update_profile_data']);
        Route::post('/change-password', [ChangePasswordController::class, 'change_password']);
    });
});
///Get image path////
Route::post('/get_path', [AuthController::class, 'image_path_with_default']);
///Payment history////
Route::get('/payment-history', [StripeController::class, 'payment_history']);
////Customer Api
Route::prefix('/customer')->group(function () {
    Route::post('/customer-register', [CustomerGuestController::class, 'signup']);
    Route::post('/customer-login', [CustomerGuestController::class, 'login']);
    // Route::post('/send-otp-code', [CustomerGuestController::class, 'sendOTPCode']);
    // Route::post('/get-link-detail', [CustomerGuestController::class, 'getLinkDetail']);
    Route::group(['middleware' => 'auth:customerapi'], function () {
        Route::get('/profile', [ProfileController::class, 'customer_profile']);
        Route::post('/profile/update', [ProfileController::class, 'customer']);
        Route::post('/customer_order',[CustomerOrderController::class, 'customer_order']);
        ///////route of items//////////////////
        Route::post('/create-items', [ItemController::class, 'submit']);
    });
});
Route::get('/index', [FrontController::class, 'index'])->name('index');
Route::prefix('/blog')->group(function () {
    Route::get('/', [FrontController::class, 'blog'])->name('blog');
    Route::get('/detail/{slug}', [FrontController::class, 'blog_detail'])->name('blog_detail');
});
Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::get('/explore', [FrontController::class, 'explore'])->name('explore');
Route::get('/author', [FrontController::class, 'author'])->name('author');
Route::get('/general_setting', [FrontController::class, 'general_setting'])->name('general_setting');
Route::get('/migrate', [DatabaseManageController::class, 'Add']);




// Route::post('/nfcrequest', [NfcRequestController::class, 'submit']);
// Route::get('/webpages_show/{provider}', [WebController::class, 'webpages_show_provider']);
// Route::get('/webpages_show', [WebController::class, 'webpages_show']);
//end//////
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
