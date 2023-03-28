<?php

Route::group([
    'prefix' => 'api/v1',
    'namespace' => 'Botble\Api\Http\Controllers',
    'middleware' => ['api'],
], function () {
    Route::get('connected', 'MobileController@connected');

    Route::post('register', 'AuthenticationController@register');
    Route::post('login', 'AuthenticationController@login');

    Route::post('password/forgot', 'ForgotPasswordController@sendResetLinkEmail');

    Route::post('resend-verify-account-email', 'VerificationController@resend');

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('logout', 'AuthenticationController@logout');
        Route::get('me', 'ProfileController@getProfile');
        Route::put('me', 'ProfileController@updateProfile');
        Route::post('update/avatar', 'ProfileController@updateAvatar');
        Route::put('update/password', 'ProfileController@updatePassword');

        Route::get('authenticate', [UserController::class, 'authenticate']);
        Route::get('products_by_category/{categoryId}',[MobileProductController::class, 'products_by_category']);
        Route::get('product_details/{productId}',[MobileProductController::class, 'product_details']);
        Route::get('products_by_name/{name}',[MobileProductController::class, 'products_by_name']);
        Route::post('search_product/{search_query}',[MobileProductController::class, 'search_product']);
        Route::post('bookings', [MobileProductController::class, 'store_booking']);
        Route::post('password', [MobileProductController::class, 'store_password']);
        Route::post('email', [MobileProductController::class, 'store_email']);
        Route::get('bookings/{name}', [MobileProductController::class, 'get_bookings']);
        Route::get('booking_by_id/{id}', [MobileProductController::class, 'get_booking_by_id']);
        Route::get('top_products',[MobileProductController::class, 'top_products']);
        Route::post('update_name/{id}',[MobileProductController::class, 'update_name']);
        Route::post('update_contact/{id}',[MobileProductController::class, 'update_contact']);
        Route::post('update_email/{id}',[MobileProductController::class, 'update_email']);
        Route::post('update_password/{id}',[MobileProductController::class, 'update_password']);
        
    });
});
