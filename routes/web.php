<?php

Route::get('/', function () {
    return redirect(route('admin'));
});
// Admin
Route::prefix( '/admin' )->middleware('auth')->group( function ()
{
    // index
    Route::get('/', 'HomeController@home')->name('admin');
    // SuperVisors
    Route::prefix( '/employees' )->group( function ()
    {
        Route::get('/', 'EmployeeController@index')->name('employees');
        Route::get('/create', 'EmployeeController@create')->name('employees.create');
        Route::post('/store', 'EmployeeController@store')->name('employees.store');
        Route::get('/edit/{user}', 'EmployeeController@edit')->name('employees.edit');
        Route::put('/update/{user}', 'EmployeeController@update')->name('employees.update');
        Route::get( '/delete/{user}', 'EmployeeController@delete')->name('employees.delete');
    });
    // tickets
    Route::prefix( '/customers' )->group( function ()
    {
        Route::get('/', 'CustomerController@index')->name('customers');
        Route::get('/create', 'CustomerController@create')->name('customers.create');
        Route::post('/store', 'CustomerController@store')->name('customers.store');
        Route::get('/view/{customer}', 'CustomerController@view')->name('customers.view');
        Route::get('/edit/{customer}', 'CustomerController@edit')->name('customers.edit');
        Route::put('/update/{customer}', 'CustomerController@update')->name('customers.update');
        Route::get('/call/{customer}', 'CustomerController@call')->name('customers.call');
        Route::get('/visit/{customer}', 'CustomerController@visit')->name('customers.visit');
        Route::get( '/delete/{customer}', 'CustomerController@delete')->name('customers.delete');
    });
    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
