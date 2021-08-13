<?php

/**
 * All route names are prefixed with 'admin.'.
 */

use Illuminate\Support\Facades\Route;

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
