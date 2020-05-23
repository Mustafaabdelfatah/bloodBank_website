<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=>'v1' , 'namespace'=>'Api' ],function(){


    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
    Route::post('reset-password','AuthController@reset_password');
    Route::post('new-password','AuthController@new_password');

    Route::group(['middleware'=>'auth:api'],function(){


        Route::get('cities','MainController@cities');
        Route::get('governorates','MainController@governorates');
        Route::get('posts','MainController@posts');
        Route::post('profile','MainController@profile');
        Route::get('categories','MainController@category');
        Route::get('settings','MainController@setting');
        Route::post('contact-us','MainController@contact');
        Route::get('register-token','AuthController@registerToken');
        Route::post('remove-token','AuthController@removeToken');
        Route::post('donation-request/create','mainController@donationRequestCreate');
        Route::post('post-favourite','MainController@postFavourite');
        Route::get('my-favourites', 'MainController@myFavourites');
        Route::get('notifications', 'MainController@notifications');


    });

});

//prefix ... api\v1\..
//namespace .. Api\..
