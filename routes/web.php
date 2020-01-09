<?php

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    
    Route::group(['prefix' => 'profile'], function() {
        Route::get('', 'HomeController@profile');
    });

    Route::group(['prefix' => 'student'], function() {
        Route::get('', 'StudentController@index');
        Route::get('form/{action}/{id?}', 'StudentController@form');
        Route::post('data', 'StudentController@store');
        Route::put('{id}', 'StudentController@update');
        Route::delete('{id}', 'StudentController@destroy');
    });

    Route::group(['prefix' => 'student-class'], function() {
        Route::get('', 'ClassesController@index');
        Route::post('list', 'ClassesController@list');
        Route::get('form/{action}/{id?}', 'ClassesController@form');
        Route::post('data', 'ClassesController@store');
        Route::put('{id}', 'ClassesController@update');
        Route::delete('{id}', 'ClassesController@destroy');
    });

    Route::group(['prefix' => 'dormitory'], function() {
        Route::get('', 'DormController@index');
        Route::post('list', 'DormController@list');
        Route::get('form/{action}/{id?}', 'DormController@form');
        Route::post('data', 'DormController@store');
        Route::get('excel', 'DormController@excel');
        Route::post('findm', 'DormController@loadData');
        Route::post('finds', 'StudentController@loadData');
        Route::put('{id}', 'DormController@update');
        Route::delete('{id}', 'DormController@destroy');
    });

    Route::group(['prefix' => 'datatable'], function(){
        Route::get('student', 'DatatableController@student');
        Route::get('student-class', 'DatatableController@class');
        Route::get('dormitory', 'DatatableController@dorm');
    });

    Route::post('provinces', 'IndonesiaController@provinces')->name('provinces');
    Route::post('list-regency', 'IndonesiaController@listRegency')->name('list-regency');
    Route::post('regencies', 'IndonesiaController@regencies')->name('regencies');
    Route::post('regencies-districts', 'IndonesiaController@regencies_districts')->name('regencies-districts');
    Route::post('regency-district', 'IndonesiaController@regency_district')->name('regency-district');
    Route::post('districts', 'IndonesiaController@districts')->name('districts');
    Route::post('villages', 'IndonesiaController@villages')->name('villages');
    Route::post('province', 'IndonesiaController@province')->name('province');
    Route::post('regency', 'IndonesiaController@regency')->name('regency');
    Route::post('district', 'IndonesiaController@district')->name('district');
    Route::post('village', 'IndonesiaController@village')->name('village');
    Route::post('get-full', 'IndonesiaController@getFull')->name('getFull');

});  
