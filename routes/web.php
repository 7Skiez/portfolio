<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Voyager\VoyagerSettingsController;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('portfolio.home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('settings/colors', [VoyagerSettingsController::class, 'colors'])->middleware('admin.user');

    $namespacePrefix = '\\'.config('voyager.controllers.namespace').'\\';

    Route::post('menus/{menu}/featured', ['uses' => $namespacePrefix.'VoyagerMenuController@toggle_featured', 'as' => 'voyager.menus.toggle_featured']);
});

// Route::get('/fix', function () {
//     dump(myMenu('admin', '_json'));
//     die;
// });