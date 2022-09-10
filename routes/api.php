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
use App\Http\Controllers\Api\contact\ContactusController;
use App\Http\Controllers\Api\Seller\Guest\GuestController;
use App\Http\Controllers\Api\Barber\Profile\BarberController;
use App\Http\Controllers\Api\collection\CollectionController;
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
    Route::group(['middleware' => 'auth:sellerServiceApi'], function () {
        Route::get('/profile', [ProfileController::class, 'customer_profile']);
        Route::post('/profile/update', [ProfileController::class, 'customer']);
        Route::post('/customer_order',[CustomerOrderController::class, 'customer_order']);
        ///////route of items//////////////////
        Route::post('/create-items', [ItemController::class, 'submit']);
        //////route of collection////
        Route::get('/collection', [CollectionController::class, 'index']);
        Route::get('/collection-category', [CollectionController::class, 'category'])->name('collection-category');
        Route::post('/create-collection', [CollectionController::class, 'submit']);

    });
});
Route::get('/index', [FrontController::class, 'index'])->name('index');
Route::prefix('/blog')->group(function () {
    Route::get('/', [FrontController::class, 'blog'])->name('blog');
    Route::get('/detail/{id}', [FrontController::class, 'blog_detail'])->name('blog_detail');
});
Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::get('/items_detail/{id}', [ItemController::class, 'items_detail'])->name('items_detail');
Route::get('/explore', [FrontController::class, 'explore'])->name('explore');
Route::get('/author', [FrontController::class, 'author'])->name('author');
Route::get('/general_setting', [FrontController::class, 'general_setting'])->name('general_setting');
Route::get('/migrate', [DatabaseManageController::class, 'Add']);
Route::post('/contactus', [ContactusController::class, 'contactus'])->name('contactus');




// Route::post('/nfcrequest', [NfcRequestController::class, 'submit']);
// Route::get('/webpages_show/{provider}', [WebController::class, 'webpages_show_provider']);
// Route::get('/webpages_show', [WebController::class, 'webpages_show']);
//end//////
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
