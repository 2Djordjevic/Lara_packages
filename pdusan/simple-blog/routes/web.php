<?php

use Illuminate\Support\Facades\Route;

Route::group([/*'middleware' => ['auth:web'], */'namespace' => 'Pdusan\SimpleBlog\Http\Controllers'], function () {

    Route::group(['prefix' => 'sblog'], function () {
        Route::get('/', 'BlogController@index')->name('sblog.blog.index');
        Route::group(['prefix' => 'blog'], function () {
            Route::get('/', 'BlogController@index')->name('sblog.blog.index');
            Route::get('create', 'BlogController@create')->name('sblog.blog.create');
            Route::post('store', 'BlogController@store')->name('sblog.blog.store');
            Route::get('edit/{id}', 'BlogController@edit')->name('sblog.blog.edit');
            Route::put('update/{id}', 'BlogController@update')->name('sblog.blog.update');
            Route::get('show/{id}', 'BlogController@show')->name('sblog.blog.show');
            Route::delete('delete/{id}', 'BlogController@delete')->name('sblog.blog.delete');
        });

    });
});
