<?php




    Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function()
    {

        Route::prefix('dashboard')->name('dashboard.')->group(function(){

            Route::get('/',function(){
                return view('dashboard.home');
            });

            Route::resource('governorates','GovernorateController');
            Route::resource('cities','CityController');
            Route::resource('categories','CategoryController');
            Route::get('contacts','ContactController@index')->name('dashboard.contacts.index');
            Route::delete('contacts/{id}','ContactController@destroy');
            Route::resource('donations','DonationRequestController');



        });


    });
