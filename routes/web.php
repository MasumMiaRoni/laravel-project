<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth']], function () {



Route::get('/add-category','CatagoryController@category');
Route::post('/add-category-post','CatagoryController@categoryPost');
Route::get('/view-category-list','CatagoryController@categoryView');
Route::get('/delete-category/{cat_id}','CatagoryController@categoryDelete');
Route::get('/edit-category/{cat_id}','CatagoryController@categoryEdit');
Route::post('/update-category-post','CatagoryController@categoryUpdate');


Route::get('/add-subcategory','SubCategoryController@SubCategory');
Route::post('/add-subcategory-post','SubCategoryController@SubCategoryPost');
Route::get('/view-subcategory-list','SubCategoryController@SubCategoryView');
Route::get('/delete-subcategory/{cat_id}','SubCategoryController@SubCategoryDelete');
Route::get('/edit-subcategory/{cat_id}','SubCategoryController@SubCategoryEdit');
Route::post('/update-subcategory-post','SubCategoryController@SubCategoryUpdate');
Route::get('/deleted-subcategory','SubCategoryController@SubCategoryDeleted');
Route::get('/restore-subcategory/{id}','SubCategoryController@SubCategoryRestore');
Route::get('/permanent-deleted-subcategory/{id}','SubCategoryController@SubCategoryPDeleted');


Route::get('/add-product','ProductController@Product');
Route::post('/add-product-post','ProductController@ProductPost');
Route::get('/view-product-list','ProductController@ProductView');
Route::get('/delete-product/{cat_id}','ProductController@`ProductDelete`');
Route::get('/edit-product/{pro_id}','ProductController@ProductEdit');
Route::post('/update-product-post','ProductController@ProductUpdate')->name('ProductUpdate');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer/dashboard', 'CustomerController@index')->name('customerdashboard');
Route::get('/checkout', 'CheckoutController@Checkout')->name('Checkout');
Route::get('api/get-state-list/{country_id}', 'CheckoutController@GetStateList')->name('GetStateList');
Route::get('api/get-city-list/{state_id}', 'CheckoutController@GetCityList')->name('GetCityList');
Route::post('/payment', 'PaymentController@Payment')->name('Payment');

});

Route::get('/item/{slug}', 'FrontendController@SingleProduct')->name('SingleProduct');
Route::get('/single_cart/{slug}', 'FrontendController@SingleCart')->name('SingleCart');
Route::post('/cart/update', 'CartController@CartUpdate')->name('CartUpdate');
Route::get('/cart', 'CartController@Cart')->name('Cart');
Route::get('/cart/{coupon}', 'CartController@Cart')->name('CouponCart');
Route::get('/single/cart-delete/{id}', 'CartController@SingleCartDelete')->name('SingleCartDelete');
Route::get('/shop', 'FrontendController@shop')->name('shop');
Route::get('/', 'FrontendController@FrontPage')->name('home');
Route::get('login/github', 'SocialController@redirectToProvider')->name('redirectToProvider');
Route::get('login/github/callback', 'SocialController@handleProviderCallback')->name('handleProviderCallback');
Route::get('/redirect', 'SocialController@directToProvider')->name('directToProvider');
Route::get('/callback', 'SocialController@dleProviderCallback')->name('dleProviderCallback');
Route::get('/search', 'FrontendController@search')->name('search');
