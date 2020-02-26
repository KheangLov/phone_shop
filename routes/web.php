<?php

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

Route::get('/about', 'HomeController@index')->name('home');
Route::get('/contact-us', 'HomeController@contactUs')->name('contact_us');
Route::get('/products', 'HomeController@products')->name('products');
Route::get('/product/details/{id}', 'HomeController@productDetails')->name('product_details');
Route::post('/contact-us/send', 'HomeController@sendMail')->name('contact_mail_send');
Route::post('/get-product-by-category', 'HomeController@get_product_by_cate')->name('product_get_product_by_cate');
Route::get('/search-product', 'HomeController@searchProduct')->name('search_product');

Route::get('/admin', 'AdminController@index')->name('admin_dashboard')->middleware('admin');

Route::get('/admin/user', 'UserController@index')->name('user_list')->middleware('admin');
Route::get('/admin/user/detail/{id}', 'UserController@detail')->name('user_detail')->middleware('admin');
Route::get('/admin/user/add', 'UserController@add')->name('user_add')->middleware('admin');
Route::post('/admin/user/create', 'UserController@create')->name('user_create')->middleware('admin');
Route::get('/admin/user/edit/{id}', 'UserController@edit')->name('user_edit')->middleware('admin');
Route::put('/admin/user/update/{id}', 'UserController@update')->name('user_update')->middleware('admin');
Route::put('/admin/user/password/{id}', 'UserController@changePassword')->name('user_password')->middleware('admin');
Route::get('/admin/user/delete/{id}', 'UserController@delete')->name('user_delete')->middleware('admin');
Route::post('/admin/user/search', 'UserController@search')->name('user_search')->middleware('admin');

Route::group(['middleware' => ['admin']], function () {
    Route::resource('/admin/category', 'CategoryController')->only([
        'index', 'store', 'update'
    ]);

    Route::get('/admin/category/delete/{category}', 'CategoryController@destroy')->name('category.destroy');

    Route::get('/admin/product', 'ProductController@index')->name('product');
    Route::get('/admin/product/add', 'ProductController@add')->name('product_add');
    Route::post('/admin/product/create', 'ProductController@create')->name('product_create');
    Route::get('/admin/product/edit/{id}', 'ProductController@edit')->name('product_edit');
    Route::put('/admin/product/update/{id}', 'ProductController@update')->name('product_update');
    Route::get('/admin/product/delete/{id}', 'ProductController@delete')->name('product_delete');
    Route::post('/admin/product/category', 'ProductController@add_category')->name('product_cate');

    Route::post('/admin/images/upload', 'ImageController@upload')->name('images_upload');
    Route::post('/admin/images/delete', 'ImageController@delete')->name('images_delete');
    Route::get('/admin/images', 'ImageController@index')->name('images');

    Route::get('/admin/email', 'MailController@index')->name('mail_list');
    Route::get('/admin/email/{id}', 'MailController@detail')->name('mail_detail');

    Route::get('/admin/page', 'PageController@index')->name('page');
    Route::post('/admin/page/create', 'PageController@create')->name('page_create');
    Route::patch('/admin/page/update/{id}', 'PageController@update')->name('page_update');
    Route::get('/admin/page/delete/{id}', 'PageController@destroy')->name('page_delete');

    Route::get('/admin/page-type', 'PageTypeController@index')->name('page_type');
    Route::post('/admin/page-type/create', 'PageTypeController@create')->name('page_type_create');
    // Route::put('/admin/page-type/update/{id}', 'PageTypeController@update')->name('page_type_update');
    // Route::get('/admin/page-type/delete/{id}', 'PageTypeController@destroy')->name('page_type_delete');

    Route::get('/admin/post', 'PostController@index')->name('post');
    Route::post('/admin/post/create', 'PostController@create')->name('post_create');
    Route::patch('/admin/post/update/{id}', 'PostController@update')->name('post_update');
    Route::get('/admin/post/delete/{id}', 'PostController@destroy')->name('post_delete');

    Route::get('/admin/slider', 'SliderController@index')->name('slider');
    Route::post('/admin/slider/create', 'SliderController@create')->name('slider_create');
    Route::patch('/admin/slider/update/{id}', 'SliderController@update')->name('slider_update');
    Route::get('/admin/slider/delete/{id}', 'SliderController@destroy')->name('slider_delete');
});

Route::get('/mark-as-read', function() {
    Auth::user()->unreadNotifications->markAsRead();
});
