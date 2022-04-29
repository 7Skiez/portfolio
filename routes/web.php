<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Voyager\VoyagerSettingsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Str;
use Spatie\FlareClient\View;
use TCG\Voyager\Events\RoutingAdmin;

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

    $namespacePrefix = '\\' . config('voyager.controllers.namespace') . '\\';

    Route::group(['middleware' => 'admin.user'], function () use ($namespacePrefix) {
        event(new RoutingAdmin());

        try {
            foreach (Voyager::model('DataType')::all() as $dataType) {
                $breadController = $dataType->controller
                    ? Str::start($dataType->controller, '\\')
                    : $namespacePrefix . 'VoyagerBaseController';

                Route::post($dataType->slug . '/0', $breadController . '@feature_toggle')->name('voyager.' . $dataType->slug . '.feature_toggle');
                Route::post($dataType->slug . '/1', $breadController . '@set_active')->name('voyager.' . $dataType->slug . '.set_active');
            }
        } catch (\InvalidArgumentException $e) {
            throw new \InvalidArgumentException("Custom routes hasn't been configured because: " . $e->getMessage(), 1);
        } catch (\Exception $e) {
            // do nothing, might just be because table not yet migrated.
        }

        Route::get('settings/colors', [VoyagerSettingsController::class, 'colors']);

        Route::post('menus/{menu}/featured', ['uses' => $namespacePrefix . 'VoyagerMenuController@feature_toggle', 'as' => 'voyager.menus.toggle_feature']);

        Route::get('/migrate', function () {
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed');
        });

        Route::get('/listcachedkeys', function () {
            return listCachedKeys();
        });
    });
});

Route::get('/particles', function () {
    return View('particles');
});

Route::get('/nebula', function () {


    // $responseID = Http::withHeaders([
    //     'Content-Type' => "application/json"
    // ])->withToken('Base ' . base64_encode('Johncreatesgreenery:cTHACAgYmSb2DVzqPoZN78bxq'))->post('http://api.scraping-bot.io/scrape/data-scraper', [
    //     'scraper' => 'linkedinProfile',
    //     'url' => 'linkedin.com/in/7codez'
    // ]);

    // $response = Http::withToken('Base ' . base64_encode('Johncreatesgreenery:cTHACAgYmSb2DVzqPoZN78bxq'))->get('http://api.scraping-bot.io/scrape/data-scraper-response',[
    //     'responseid' => $responseID,
    //     'scraper' => 'linkedinProfile'
    // ]);

    // $response = Http::withToken('123a62bd-eb74-463e-a195-a13df4879d60')->get('https://nubela.co/proxycurl/api/v2/linkedin', [
    //     'url' => 'linkedin.com/in/amir-ivno-9034b0163',
    // ]);

    $response = Http::get('https://api.peopledatalabs.com/v5/person/enrich', [
        'api_key' => '5310710d18e0a1992d2d71335cefe73441e9546708be6b0be442a5fc15c4bb5f',
        'pretty' => True,
        'profile' => 'linkedin.com/in/amir-ivno-9034b0163'
    ]);
    
    return $response->json();

    return view('nebula');
});