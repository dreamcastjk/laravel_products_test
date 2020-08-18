<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function () {
    Route::get('/products', 'ProductsController')->name('product.list');
});
