<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'search',
    'as'         => 'search.',
    'namespace'  => 'Search',
], function () {

    /*
     * Search Specific Functionality
     */
    Route::get('/', 'SearchController@index')->name('index');
});
