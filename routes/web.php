<?php

use App\Models\Income;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ImageController;
use App\View\Components\createwalletmodel;
use App\Http\Controllers\admin\WebController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\User\FrontController;
use App\Http\Controllers\User\RolesController;
use App\Http\Controllers\admin\FormsController;
use App\Http\Controllers\admin\IncomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SellersController;
use App\Http\Controllers\admin\LanguageController;
use App\Http\Controllers\admin\blog\BlogController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\nft\ItemsController;
use App\Http\Controllers\admin\NfcRequestController;
use App\Http\Controllers\admin\permissionController;
use App\Http\Controllers\admin\AuthenticationController;
use App\Http\Controllers\admin\GeneralSettingController;
use App\Http\Controllers\Table\DatabaseManageController;
use App\Http\Controllers\admin\nft\CollectionsController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\customer\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Login Page Route
Route::get('/', [AuthenticationController::class, 'login_cover'])->name('login');
// Route::get('/auth-forgot-password-basic', [AuthenticationController::class, 'forgotpassword'])->name('login');
Route::post('/signin', [AuthenticationController::class, 'login'])->name('submitLogin');
///////middleware//////////////
Route::group(['middleware' => 'auth:web'], function () {
    ////////Admin Routes
    Route::group(['prefix' => 'admin'], function () {
        ///////// route of dashboard ///////////////////////
        Route::get('dashboard', [DashboardController::class, 'dashboardEcommerce'])->name('dashboard-ecommerce');
        //////// route of users////////////////
        Route::get('user/list', [UserController::class, 'index'])->name('app-user-list');
        Route::get('adduser', [UserController::class, 'create'])->name('form-useradd');
        Route::get('reapt', [FormsController::class, 'validation'])->name('form-reapt');
        Route::post('user/add', [UserController::class, 'submit'])->name('useradd');
        Route::get('edituser/{id}', [UserController::class, 'edit'])->name('form-useredit');
        Route::post('user/add/{id}', [UserController::class, 'update'])->name('useredit');
        Route::post('user/delete/{id}', [UserController::class, 'destory'])->name('usersdlt');
        ///////// route of rules /////////////////////
        Route::get('role-list', [RolesController::class, 'index'])->name('app-roles-list');
        Route::get('roles-create', [RolesController::class, 'create'])->name('roles-create');
        Route::post('roles/add', [RolesController::class, 'submit'])->name('rolesadd');
        Route::get('edit/{id}', [RolesController::class, 'edit'])->name('form-edit');
        Route::any('roles/add/{id}', [RolesController::class, 'update'])->name('rolesedit');
        Route::post('roles/delete/{id}', [RolesController::class, 'destroy'])->name('rolesdelete');
        ///////// route of permissions//////////////////////////
        Route::get('permission/list', [permissionController::class, 'index'])->name('permission');
        Route::get('permission/create', [permissionController::class, 'create'])->name('permissioncreate');
        Route::post('permission/add', [permissionController::class, 'submit'])->name('permissionadd');
        Route::get('permission/edit/{id}', [permissionController::class, 'edit'])->name('permision.edit');
        Route::post('permission/update/{id}', [permissionController::class, 'update'])->name('permision.update');
        Route::post('permission/delete/{id}', [permissionController::class, 'destroy'])->name('permision.destroy');
        ////route of product///
        Route::get('product/list', [ProductController::class, 'index'])->name('product');
        Route::get('product-create', [ProductController::class, 'create'])->name('productcreate');
        Route::get('product-add', [ProductController::class, 'store'])->name('storeadd');
        //////// route of logout////////////
        Route::post('/signout', [AuthenticationController::class, 'logout']);
        ///////route of status/////////////////////
        Route::get('/status', [AuthenticationController::class, 'status']);
        //////route of nfcrequest/////////
        Route::get('NfcRequest/list', [NfcRequestController::class, 'index'])->name('NfcRequest');
        Route::post('NfcRequest/detail', [NfcRequestController::class, 'detail'])->name('NfcRequest.detail');
        Route::post('NfcRequest/delete/{id}', [NfcRequestController::class, 'destory'])->name('NfcRequest.delete');
        Route::get('/pdfreport', [NfcRequestController::class, 'weeklypdf'])->name('pdfreport');
        Route::get('/monthly_pdfreport', [NfcRequestController::class, 'monthlypdf'])->name('monthly_pdfreport');
        ///////Webpages Route
        Route::get('/webpage', [WebController::class, 'index'])->name('webpage');
        Route::get('/addpage', [WebController::class, 'create']);
        Route::post('/web/add', [WebController::class, 'submit'])->name('webadd');
        Route::get('editweb/{id}', [WebController::class, 'edit'])->name('form-webedit');
        Route::any('/web/add/{id}', [WebController::class, 'update'])->name('webedit');
        Route::post('web/delete/{id}', [WebController::class, 'destory'])->name('webdlt');
        Route::get('/webstatus', [WebController::class, 'status']);
        /////Route for Income Report
        Route::get('/IncomeReport/list', [IncomeController::class, 'index'])->name('incomepage');
        Route::get('/incomef',[IncomeController::class,'create']);
        Route::post('/income/add',[IncomeController::class,'submit'])->name('incomeadd');
        Route::get('/incomestatus', [IncomeController::class, 'status']);
        Route::get('/report',[IncomeController::class,'displayReport'])->name('report');
        ///Route For Seelrs Clients
        Route::get('/all-clients/list',[SellersController::class,'index'])->name('all-clients');
        Route::get('/gold/list',[SellersController::class,'gold'])->name('goldclient');
        Route::get('/Personal/list',[SellersController::class,'personal'])->name('personal');
        Route::get('/seller/link',[SellersController::class,'link'])->name('seller-link');
        Route::post('client/delete/{id}', [SellersController::class, 'destory'])->name('clientdlt');
        Route::get('/clientstatus', [SellersController::class, 'status']);
        ///////services list route/////////
        Route::get('/nfts/list',[SellersController::class,'services_list'])->name('services-list');
        /////customer route/////
        Route::get('/customer/list',[CustomerController::class,'customer_list'])->name('customer-list');
        Route::get('/create/customer', [CustomerController::class, 'create'])->name('create-customer');
        Route::post('/customer/add', [CustomerController::class, 'submit'])->name('customeradd');
        Route::get('/edit/customer/{id}', [CustomerController::class, 'edit'])->name('form-customeredit');
        Route::post('/customer/add/{id}', [CustomerController::class, 'update'])->name('customeredit');
        Route::post('/customer/delete/{id}', [CustomerController::class, 'destory'])->name('usersdlt');
        /////general seeting//////
        Route::get('/headerfooter',[GeneralSettingController::class,'create'])->name('headerfooter');
        Route::post('/submit-generalsetting',[GeneralSettingController::class,'submit'])->name('submit-generalsetting');
        ///////route of blogs//////////
        Route::get('/blog/list',[BlogController::class,'index'])->name('blog');
        Route::get('/blog-create',[BlogController::class,'create'])->name('create-blog');
        Route::post('/blog/add',[BlogController::class,'submit'])->name('blog-add');
        Route::get('/edit/blog/{id}', [BlogController::class, 'edit'])->name('form-blog-edit');
        Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('blog-update');
        Route::post('/blog/delete/{id}', [BlogController::class, 'destory'])->name('blog-delete');
        Route::get('/blog/status', [BlogController::class, 'status'])->name('blog-status');
        //////route of category //////////
        Route::get('/category/list',[CategoryController::class,'index'])->name('category');
        Route::get('/category-create',[CategoryController::class,'create'])->name('create-category');
        Route::post('/category/add',[CategoryController::class,'submit'])->name('category-add');
        Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('form-category-edit');
        Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category-update');
        Route::post('/category/delete/{id}', [CategoryController::class, 'destory'])->name('category-delete');
        Route::get('/category/status', [CategoryController::class, 'status'])->name('category-status');
        //////route of Collections //////////
        Route::get('/collection/list',[CollectionsController::class,'index'])->name('collection');
        Route::get('/collection-create',[CollectionsController::class,'create'])->name('create-collection');
        Route::post('/collection/add',[CollectionsController::class,'submit'])->name('collection-add');
        Route::get('/edit/collection/{id}', [CollectionsController::class, 'edit'])->name('form-collection-edit');
        Route::post('/collection/update/{id}',[CollectionsController::class,'update'])->name('collection-update');
        Route::post('/collection/delete/{id}', [CollectionsController::class, 'destory'])->name('collection-delete');
        Route::get('/collection/status', [CollectionsController::class, 'status'])->name('collection-status');
        ////////route of creat-item /////////////////
        Route::get('/item/list',[ItemsController::class,'index'])->name('item');
        Route::get('/item-create',[ItemsController::class,'create'])->name('create-item');
        Route::post('/item/add',[ItemsController::class,'submit'])->name('item-add');
        Route::get('/edit/item/{id}', [ItemsController::class, 'edit'])->name('form-item-edit');
        Route::post('/item/update/{id}',[ItemsController::class,'update'])->name('item-update');
        Route::post('/item/delete/{id}', [ItemsController::class, 'destory'])->name('item-delete');
        Route::get('/item/status', [ItemsController::class, 'status'])->name('item-status');
        //////create wallet/////
        Route::get('/wallet-list',[createwalletmodel::class,'render']);
        Route::get('/create-wallet',[createwalletmodel::class,'createWallet'])->name('create-wallet');


    });
});
// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
Route::get('admin/clear', [LanguageController::class, 'cache_clear'])->name('clear');
Route::get('convert-pdf-to-image', [ImageController::class, 'index'])->name('form');

///To Add table in database
Route::get('/addtable', [DatabaseManageController::class, 'Add']);
Route::get('/reauth-stripe', [LanguageController::class, 'reauth_stripe'])->name('reauth_stripe');
Route::get('/migrate',function(){
    Artisan::call('migrate');

});
