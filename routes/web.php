<?php

Route::post('lang', ['as' => 'lang', 'uses' => 'LangController@postIndex']);

/**
 * Adminpanel routes
 */
Route::group(['namespace' => 'Admin' ,'prefix' => 'admin'] ,function (){

    Route::group(['namespace' => 'Auth'] ,function (){
        Route::get('/login' ,['as' => 'admin.auth' ,'uses' => 'LoginController@getLogin']);
        Route::post('/login' ,['as' => 'admin.auth' ,'uses' => 'LoginController@postLogin']);
        Route::get('/logout', 'LoginController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'] ,function (){

        //dashboard route
        Route::get('/' ,['as' => 'admin.dashboard' ,'uses' => 'DashboardController@getIndex']);
        //Home route
        Route::post('/' ,['as' => 'admin.dashboard' ,'uses' => 'HomeController@postIndex']);

        /**
         * site-info routes
         */
        Route::group(['prefix' => 'site-info'] ,function (){
            Route::get('/' ,['as' => 'admin.settings' ,'uses' => 'SettingController@getIndex']);
            Route::post('/' ,['as' => 'admin.settings' ,'uses' => 'SettingController@postIndex']);
        });

        /**
         * about-us routes
         */
        Route::group(['prefix' => 'about-us'] ,function (){
            Route::get('/' ,['as' => 'admin.about' ,'uses' => 'AboutController@getIndex']);
            Route::get('/info/{id}', ['as' => 'admin.about.info', 'uses' => 'AboutController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.about.edit' ,'uses' => 'AboutController@postIndex']);
        });

        /**
         * why routes
         */
        Route::group(['prefix' => 'why-pure-wash'] ,function (){
            Route::get('/' ,['as' => 'admin.why' ,'uses' => 'WhyController@getIndex']);
            Route::get('/info/{id}', ['as' => 'admin.why.info', 'uses' => 'WhyController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.why.edit' ,'uses' => 'WhyController@postIndex']);
        });

        /**
         * services routes
         */
        Route::group(['prefix' => 'services'], function () {
            Route::get('/', ['as' => 'admin.services', 'uses' => 'ServiceController@getIndex']);
            Route::post('/', ['as' => 'admin.services', 'uses' => 'ServiceController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.services.info', 'uses' => 'ServiceController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.services.edit', 'uses' => 'ServiceController@postEdit']);
            Route::post('/delete', ['as' => 'admin.services.delete', 'uses' => 'ServiceController@postDelete']);
        });

        /**
         * cars routes
         */
        Route::group(['prefix' => 'cars'], function () {
            Route::get('/', ['as' => 'admin.cars', 'uses' => 'CarController@getIndex']);
            Route::post('/', ['as' => 'admin.cars', 'uses' => 'CarController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.cars.info', 'uses' => 'CarController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.cars.edit', 'uses' => 'CarController@postEdit']);
            Route::post('/delete', ['as' => 'admin.cars.delete', 'uses' => 'CarController@postDelete']);
        });

        /**
         * types routes
         */
        Route::group(['prefix' => 'types'], function () {
            Route::get('/{id}', ['as' => 'admin.types', 'uses' => 'TypeController@getIndex']);
            Route::post('/{id}', ['as' => 'admin.types', 'uses' => 'TypeController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.types.info', 'uses' => 'TypeController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.types.edit', 'uses' => 'TypeController@postEdit']);
            Route::post('/delete/{id}', ['as' => 'admin.types.delete', 'uses' => 'TypeController@postDelete']);
        });

        /**
         * companies routes
         */
        Route::group(['prefix' => 'companies'], function () {
            Route::get('/', ['as' => 'admin.companies', 'uses' => 'CompanyController@getIndex']);
            Route::post('/', ['as' => 'admin.companies', 'uses' => 'CompanyController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.companies.info', 'uses' => 'CompanyController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.companies.edit', 'uses' => 'CompanyController@postEdit']);
            Route::post('/delete', ['as' => 'admin.companies.delete', 'uses' => 'CompanyController@postDelete']);
            
            Route::get('/reports/{code}' ,['as' => 'admin.companies.reports' ,'uses' => 'CompanyController@getReport']);
        });

        /**
         * users routes
         */
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', ['as' => 'admin.users', 'uses' => 'UserController@getIndex']);
            Route::post('/', ['as' => 'admin.users', 'uses' => 'UserController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.users.info', 'uses' => 'UserController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.users.edit', 'uses' => 'UserController@postEdit']);
            Route::post('/delete', ['as' => 'admin.users.delete', 'uses' => 'UserController@postDelete']);
        });

        /**
         * packages routes
         */
        Route::group(['prefix' => 'packages'], function () {
            Route::get('/{id}', ['as' => 'admin.packages', 'uses' => 'PackageController@getIndex']);
            Route::post('/{id}', ['as' => 'admin.packages', 'uses' => 'PackageController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.packages.info', 'uses' => 'PackageController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.packages.edit', 'uses' => 'PackageController@postEdit']);
            Route::post('/delete/{id}', ['as' => 'admin.packages.delete', 'uses' => 'PackageController@postDelete']);
        });

        /**
         * package prices routes
         */
        Route::group(['prefix' => 'package-prices'], function () {
            Route::get('/{id}', ['as' => 'admin.prices', 'uses' => 'PackagePriceController@getIndex']);
            Route::post('/{id}', ['as' => 'admin.prices', 'uses' => 'PackagePriceController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.prices.info', 'uses' => 'PackagePriceController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.prices.edit', 'uses' => 'PackagePriceController@postEdit']);
            Route::post('/delete/{id}', ['as' => 'admin.prices.delete', 'uses' => 'PackagePriceController@postDelete']);
        });

        /**
         * washes routes
         */
        Route::group(['prefix' => 'washes'], function () {
            Route::get('/{id}', ['as' => 'admin.washes', 'uses' => 'WashController@getIndex']);
            Route::post('/{id}', ['as' => 'admin.washes', 'uses' => 'WashController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.washes.info', 'uses' => 'WashController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.washes.edit', 'uses' => 'WashController@postEdit']);
            Route::post('/delete/{id}', ['as' => 'admin.washes.delete', 'uses' => 'WashController@postDelete']);
            Route::get('/notes/{id}' ,['as' => 'admin.washes.notes' ,'uses' => 'WashController@getNote']);
            Route::get('/messages/{id}' ,['as' => 'admin.washes.messages' ,'uses' => 'WashController@getMessage']);
        });

        //notifications route
        Route::get('/notifications' ,['as' => 'admin.notifications' ,'uses' => 'NotificationController@getIndex']);
        Route::post('/notifications/update/{id}' ,['as' => 'admin.notifications.update' ,'uses' => 'NotificationController@postUpdate']);
        Route::get('/notifications/delete/{id}' ,['as' => 'admin.notifications.delete' ,'uses' => 'NotificationController@getDelete']);


        //members route
        Route::get('/members/{id}' ,['as' => 'admin.members' ,'uses' => 'MemberController@getIndex']);
        Route::get('/members/delete/{id}' ,['as' => 'admin.members.delete' ,'uses' => 'MemberController@getDelete']);
        Route::get('/orders/{id}' ,['as' => 'admin.members.orders' ,'uses' => 'MemberController@getOrder']);
        Route::post('/orders/update/{id}' ,['as' => 'admin.members.orders.edit' ,'uses' => 'MemberController@postUpdate']);
        Route::get('/orders/delete/{id}' ,['as' => 'admin.members.orders.delete' ,'uses' => 'MemberController@getDeleteOrder']);

        /**
         * contact messages routes
         */
        Route::group(['prefix' => 'messages'] ,function (){
            Route::get('/' ,['as' => 'admin.contact' ,'uses' => 'MessageController@getIndex']);
            Route::get('/delete/{id}' ,['as' => 'admin.contact.delete' ,'uses' => 'MessageController@getDelete']);
        });

        /**
         * subscribers routes
         */
        Route::group(['prefix' => 'subscribers'] ,function (){
            Route::get('/' ,['as' => 'admin.subscribers' ,'uses' => 'SubscriberController@getIndex']);
            Route::get('/delete/{id}' ,['as' => 'admin.subscribers.delete' ,'uses' => 'SubscriberController@getDelete']);
        });

        /**
         * reports route
         */
        Route::get('/reports' ,['as' => 'admin.reports' ,'uses' => 'ReportController@getIndex']);
    });
});

/**
 * site routes
 */
Route::group(['namespace' => 'Site'] ,function (){

    /**
     * get car models route
     */
    Route::get('/types' ,['as' => 'site.types' ,'uses' => 'Auth\AuthController@getModel']);

    /**
     * home route
     */
    Route::get('/' ,['as' => 'site.index' ,'uses' => 'HomeController@getIndex']);
    Route::post('subscribe' ,['as' => 'site.subscribe' ,'uses' => 'HomeController@postSubscribe']);

    /**
     * About us route
     */
    Route::get('/about-us' ,['as' => 'site.about' ,'uses' => 'AboutController@getIndex']);

    /**
     * Why us route
     */
    Route::get('/why-us' ,['as' => 'site.why' ,'uses' => 'WhyController@getIndex']);

    /**
     * services route
     */
    Route::get('/services' ,['as' => 'site.services' ,'uses' => 'ServiceController@getIndex']);

    /**
     * contact route
     */
    Route::get('/contact' ,['as' => 'site.contact' ,'uses' => 'ContactController@getIndex']);
    Route::post('/contact-us' ,['as' => 'site.contact.send' ,'uses' => 'ContactController@postIndex']);

    /**
     * profile route
     */
    Route::group(['middleware' => 'auth.site'] ,function () {
        Route::get('/profile', ['as' => 'site.profile', 'uses' => 'ProfileController@getIndex']);
        Route::post('/update-profile', ['as' => 'site.profile.edit', 'uses' => 'ProfileController@postEditProfile']);
        Route::get('/packages', ['as' => 'site.packages', 'uses' => 'ProfileController@getPackage']);
        Route::get('/orders', ['as' => 'site.orders', 'uses' => 'ProfileController@getOrder']);
        Route::get('/subscribtions', ['as' => 'site.subscribtions', 'uses' => 'ProfileController@getSubscribtion']);
        Route::post('/wishlist', ['as' => 'site.wishlist', 'uses' => 'ProfileController@postWishlist']);
        Route::post('/wishlist/edit/{id}', ['as' => 'site.edit.wishlist', 'uses' => 'ProfileController@postEditWishlist']);
        Route::post('/note', ['as' => 'site.note', 'uses' => 'ProfileController@postNote']);
        Route::post('/contact', ['as' => 'site.contact', 'uses' => 'ProfileController@postContact']);
        Route::get('/checkout/{id}', ['as' => 'site.checkout', 'uses' => 'ProfileController@getCheckout']);
    });
    /**
     * authentication routes
     */
    Route::group(['namespace' => 'Auth'] ,function (){
        Route::get('/login', 'AuthController@getLogin')->name('site.login');
        Route::post('/login', 'AuthController@postLogin')->name('site.login');
        Route::get('/register', 'AuthController@getRegister')->name('site.register');
        Route::post('/register', 'AuthController@postRegister')->name('site.register');
        Route::get('/activate/{token}', 'AuthController@getActivate')->name('site.activate');
        Route::get('/logout', 'AuthController@logout')->name('site.logout');
        Route::get('/reset-password','AuthController@getResetPassword')->name('site.reset');
        Route::post('/reset-password','AuthController@postResetPassword')->name('site.reset');
        Route::get('/change-password/user/{id}/hash/{hash}','AuthController@getChangePassword')->name('site.change-password');
        Route::post('/change-password/user/{id}/hash/{hash}','AuthController@postChangePassword')->name('site.change-password');
    });
});