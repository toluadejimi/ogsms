<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SimController;
use App\Http\Controllers\WorldNumberController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/proxy/prices', function (Illuminate\Http\Request $request) {
    // Get the 'country' query parameter
    $country = $request->query('country');

    // Make the request to the 5sim API from the Laravel server
    $response = Http::get('https://5sim.net/v1/guest/prices', [
        'country' => $country,
    ]);

    return $response->json();
});



//auth

Route::get('/',  [HomeController::class,'index']);


Route::post('login_now',  [HomeController::class,'login']);
// Route::get('login',  [HomeController::class,'login_index']);
Route::get('login',  [HomeController::class,'login_index'])->name('login');
Route::post('register_now',  [HomeController::class,'register']);
Route::get('register',  [HomeController::class,'register_index']);

Route::get('ban',  [HomeController::class,'ban_view']);
Route::get('ban-user',  [HomeController::class,'ban_user']);






Route::get('log-out',  [HomeController::class,'logout']);
Route::post('reset-password-now',  [HomeController::class,'reset_password_now']);
Route::post('reset-password',  [HomeController::class,'reset_password']);
Route::get('expired',  [HomeController::class,'expired']);
Route::get('verify-password',  [HomeController::class,'verify_password']);
Route::get('forgot-password',  [HomeController::class,'forget_password']);
Route::get('faq',  [HomeController::class,'faq']);
Route::get('terms',  [HomeController::class,'terms']);
Route::get('policy',  [HomeController::class,'policy']);
Route::get('rules',  [HomeController::class,'rules']);
Route::post('update-password-now',  [HomeController::class,'update_password_now']);

Route::any('get-smscode',  [HomeController::class,'get_smscode']);





Route::group(['middleware' => ['auth', 'user', 'session.timeout']], function () {

    Route::get('us',  [HomeController::class,'home']);

    Route::any('home',  [WorldNumberController::class,'home']);
    Route::any('world',  [WorldNumberController::class,'home']);

    Route::any('check-av',  [WorldNumberController::class,'check_av']);
    Route::any('order_now',  [WorldNumberController::class,'order_now']);
    Route::any('order_now_qk',  [WorldNumberController::class,'order_now_qk']);
    Route::any('get-smscodeworld',  [WorldNumberController::class,'get_smscode']);

    Route::any('orders',  [HomeController::class,'orders']);
    Route::any('api',  [HomeController::class,'api_index']);
    Route::post('set-webhook',  [HomeController::class,'set_webhook']);
    Route::any('generate-token',  [HomeController::class,'generate_token']);



    Route::any('simworld',  [SimController::class,'index']);
    Route::post('buy-csms',  [SimController::class,'order_csms']);
    Route::get('c-sms',  [SimController::class,'delete_sms']);
    Route::get('admin-c-sms',  [SimController::class,'admin_delete_sms']);
    Route::get('get-csms',  [SimController::class,'get_c_sms']);








    Route::any('receive-sms',  [HomeController::class,'receive_sms']);



    Route::any('delete-order',  [HomeController::class,'delete_order']);
    Route::any('delete-w-order',  [HomeController::class,'delete_w_order']);
    Route::any('admin-cancle-sms',  [HomeController::class,'admin_cancle_sms']);

    Route::any('delete-order-admin',  [HomeController::class,'delete_order_admin']);





    Route::post('order-usnumber-now',  [HomeController::class,'order_now']);

    Route::any('cancle-sms',  [HomeController::class,'cancle_sms']);
    Route::any('check-sms',  [HomeController::class,'check_sms']);


Route::get('welcome',  [HomeController::class,'welcome_index']);
Route::get('fund-wallet',  [HomeController::class,'fund_wallet']);
Route::get('profile',  [HomeController::class,'profile']);
Route::post('fund-now',  [HomeController::class,'fund_now']);
Route::get('verify',  [HomeController::class,'verify_payment']);
Route::get('verifypay',  [HomeController::class,'verifypay_payment']);

Route::get('resolve-page',  [HomeController::class,'resloveDeposit']);
Route::any('resolve-now',  [HomeController::class,'resolveNow']);
Route::get('change-password',  [HomeController::class,'change_password']);




});





























//admin
Route::get('admin',  [AdminController::class,'index']);

Route::get('admin-dashboard',  [AdminController::class,'admin_dashboard']);


Route::any('update-rate',  [AdminController::class,'update_rate']);
Route::any('update-cost',  [AdminController::class,'update_cost']);

Route::any('update-sim-rate',  [AdminController::class,'update_sim_rate']);
Route::any('update-sim-cost',  [AdminController::class,'update_sim_cost']);
Route::any('update-quickorder',  [AdminController::class,'update_quick_order']);


Route::get('manual-payment',  [AdminController::class,'manual_payment_view']);
Route::any('verify-payment',  [AdminController::class,'approve_payment']);
Route::any('update-acct-name',  [AdminController::class,'update_acct_name']);
Route::any('delete-payment',  [AdminController::class,'delete_payment']);

Route::any('update-api-per',  [AdminController::class,'update_api_per']);



Route::any('fund-manual-now',  [HomeController::class,'fund_manual_now']);
Route::any('confirm-pay',  [HomeController::class,'confirm_pay']);


Route::get('search-user',  [AdminController::class,'search_user']);
Route::any('search-username',  [AdminController::class,'search_username']);

Route::any('about-us',  [HomeController::class,'about_us']);
Route::any('policy',  [HomeController::class,'policy']);














Route::get('users',  [AdminController::class,'index_user']);
Route::get('view-user',  [AdminController::class,'view_user']);
Route::any('update-user',  [AdminController::class,'update_user']);
Route::any('account',  [AdminController::class,'admin_account']);
Route::any('set-password',  [AdminController::class,'set_password']);
Route::any('remove-user',  [AdminController::class,'remove_user']);
Route::any('unban-user',  [AdminController::class,'unban_user']);
Route::any('logout',  [AdminController::class,'logout']);






Route::post('edit-front-pr',  [AdminController::class,'edit_front_product']);





Route::post('admin-login',  [AdminController::class,'admin_login']);

















//product

Route::post('buy-now',  [ProductController::class,'buy_now']);
Route::post('item-view',  [ProductController::class,'item_view']);

Route::get('item-view',  [ProductController::class,'i_view']);

Route::get('allcatproduct',  [ProductController::class,'view_all_product']);

Route::post('add-new-product',  [ProductController::class,'add_new_product']);

Route::post('add-front-product',  [ProductController::class,'add_front_product']);

Route::get('detete-front-product',  [ProductController::class,'delete_front_product']);


Route::post('edit-new-product',  [ProductController::class,'edit_front_product']);


//Route::get('view-all',  [ProductController::class,'view_all_product']);


Route::post('/telegram', 'TelegramBotController@handle');
































