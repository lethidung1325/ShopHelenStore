<?php

use Illuminate\Support\Facades\Route;


Route::get('admin/login', 'AdminController@getLogin')->name('login_admin');
Route::post('admin/login', 'AdminController@postLogin')->name('login_admin');

Route::get('admin/logout', 'AdminController@getLogout')->name('logout_admin');

Route::group(['prefix' => 'admin', 'middleware' => ['adminMiddleware']], function () {
    Route::get('/', 'AdminController@index')->name('admin_index');

    //Category Manager
    Route::group(['prefix' => 'category'], function () {
        Route::get('add-category', 'CategoryController@getAdd')->name('add_category');
        Route::post('add-category', 'CategoryController@postAdd')->name('add_category');

        Route::get('list-categroy', 'CategoryController@getList')->name('list_category');

        Route::get('edit-category/{id}', 'CategoryController@getEdit')->name('edit_category');
        Route::post('edit-category/{id}', 'CategoryController@postEdit')->name('edit_category');

        Route::get('delete-category/{id}', 'CategoryController@postDelete')->name('delete_category');
    });

    // Product Manager
    Route::group(['prefix' => 'product'], function () {
        Route::get('add-product', 'ProductController@getAdd')->name('add_product');
        Route::post('add-product', 'ProductController@postAdd')->name('add_product');

        Route::get('list-product', 'ProductController@getList')->name('list_product');

        Route::get('edit-product/{id}', 'ProductController@getEdit')->name('edit_product');
        Route::post('edit-product/{id}', 'ProductController@postEdit')->name('edit_product');

        Route::get('delete-product/{id}', 'ProductController@postDelete')->name('delete_product');
    });

    // Account Manager
    Route::group(['prefix' => 'customer'], function () {
        Route::get('add-customer', 'CustomerController@getAdd')->name('add_customer');
        Route::post('add-customer', 'CustomerController@postAdd')->name('add_customer');

        Route::get('list-customer', 'CustomerController@getList')->name('list_customer');

        Route::get('edit-customer/{id}', 'CustomerController@getEdit')->name('edit_customer');
        Route::post('edit-customer/{id}', 'CustomerController@postEdit')->name('edit_customer');

        Route::get('delete-customer/{id}', 'CustomerController@postDelete')->name('delete_customer');
    });

    // Order Manager
    Route::group(['prefix' => 'order'], function () {
        Route::get('list-order', 'OrderController@getList')->name('list_order');

        Route::get('edit-order/{id}', 'OrderController@getEdit')->name('order.edit');
        Route::post('edit-order/{id}', 'OrderController@postEdit')->name('order.edit');

        Route::get('delete-order/{id}', 'OrderController@getDelete')->name('delete_order');

        Route::get('delete-order-item/{id}', 'OrderController@deleteOrderItem')->name('delete_order_item');
    });
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('category/{id}', 'HomeController@category')->name('category');
Route::get('product/detail/{id}', 'HomeController@detailProduct')->name('detail_product');
Route::get('search', 'HomeController@search')->name('search');

Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}', 'CartController@getAddCart')->name('add_cart');
    Route::get('show', 'CartController@showCart')->name('show_cart');
    Route::get('thank-you', 'CartController@thankyou')->name('thankyou')->middleware('customerMiddleware');

    Route::get('checkout', 'CartController@checkoutCart')->name('checkout_cart')->middleware('customerMiddleware');

    Route::get('update', 'CartController@updateCart')->name('update_cart');

    Route::get('delete/{id}', 'CartController@deleteCart')->name('delete_cart');

    Route::post('complete', 'CartController@postComplete')->name('complete')->middleware('customerMiddleware');
});

Route::get('login', 'CustomerController@getLogin')->name('login_customer');
Route::post('login', 'CustomerController@postLogin')->name('login_customer');

Route::get('singup', 'CustomerController@getSignup')->name('get_signup_customer');
Route::post('signup', 'CustomerController@postSignup')->name('post_signup_customer');

Route::get('logout', 'CustomerController@getLogout')->name('logout_customer');

Route::get('login/google', 'CustomerController@redirectToGoogle')->name('google.get');
Route::get('login/google/callback', 'CustomerController@handleGoogleCallback');

Route::post('comment/store/{id}', 'CommentController@store')->name('comment.store')->middleware('customerMiddleware');
Route::get('comment/edit/{id}', 'CommentController@edit')->name('comment.edit')->middleware('customerMiddleware');
Route::post('comment/delete/{id}', 'CommentController@destroy')->name('comment.destroy')->middleware('customerMiddleware');

Route::get('send-mail', 'MailController@sendMail')->name('mail')->middleware('customerMiddleware');
Route::get('mail-confirm/{id}', 'MailController@mailConfirm')->name('mail_confirm')->middleware('adminMiddleware');