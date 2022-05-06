<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Voyager\VoyagerSettingsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Str;
use Imgproxy\UrlBuilder;
use League\MimeTypeDetection\ExtensionMimeTypeDetector;
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

Route::get('/imgproxy', function () {

    ini_set('max_execution_time', 1200);

    $detector = new ExtensionMimeTypeDetector();

    $paths = collect(Storage::disk(config('filesystems.default'))->allFiles());

    $paths = $paths->filter(function ($file) use ($detector, $paths) {

        $detectMT = fn ($file) => $detector->detectMimeTypeFromFile($file);

        $fileIsImg = str_contains($detectMT($file), 'image/');
        $hasSameMT = ($detectMT($file) === $detectMT('.avif'));
        $desiredCopyExists = $paths->contains(rtrim($file, '.' . File::extension($file)) . '.avif');

        return ($fileIsImg && !$hasSameMT && !$desiredCopyExists);
        
    })->filter();

    foreach ($paths as $path) {

        $builtUrl = (new UrlBuilder(config('imgproxy.base_url'), config('imgproxy.key'), config('imgproxy.salt')))
            ->build(image($path), 0, 0, 'force', 'no', false, 'avif')
            ->useAdvancedMode()
            ->toString();

        $content = Http::get($builtUrl);

        if ($content->successful()) {

            $name = Str::replaceLast(File::extension($path), 'avif', $path);
            Storage::disk(config('voyager.storage.disk'))->put($name, $content);
            dump([$path => 'Successful']);
        } else {
            dump([$path => 'Failed']);
        }
    }
});
