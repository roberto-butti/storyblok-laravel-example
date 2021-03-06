<?php

use App\Http\Controllers\Storyblok;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome-laravel', function () {
    return view('welcome');
});

Route::get('{catchall}', Storyblok::class)->where('catchall', '.*');
