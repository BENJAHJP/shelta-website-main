<?php

Route::group([
    'prefix' => 'api/v1',
    'namespace' => 'Botble\Api\Http\Controllers',
    'middleware' => ['api'],
], function () {
    // Route::post('/login',[UserController::class,'index']);
    // Route::post('/signup',[UserController::class,'store']);

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

        // Route::get('authenticate', [UserController::class, 'authenticate']);
        Route::get('products_by_category/{categoryId}',[MobileController::class, 'products_by_category']);
        Route::get('product_details/{productId}',[MobileController::class, 'product_details']);
        Route::get('products_by_name/{name}',[MobileController::class, 'products_by_name']);
        Route::post('search_product/{search_query}',[MobileController::class, 'search_product']);
        Route::post('bookings', [MobileController::class, 'store_booking']);
        Route::post('password', [MobileController::class, 'store_password']);
        Route::post('email', [MobileController::class, 'store_email']);
        Route::get('bookings/{name}', [MobileController::class, 'get_bookings']);
        Route::get('booking_by_id/{id}', [MobileController::class, 'get_booking_by_id']);
        Route::get('top_products',[MobileController::class, 'top_products']);
        Route::post('update_name/{id}',[MobileController::class, 'update_name']);
        Route::post('update_contact/{id}',[MobileController::class, 'update_contact']);
        Route::post('update_email/{id}',[MobileController::class, 'update_email']);
        Route::post('update_password/{id}',[MobileController::class, 'update_password']);

    });
});
