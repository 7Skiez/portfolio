<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Str;
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

// Route::get('/imgproxy', function () {
//     ini_set('max_execution_time', 1200);
//     $detector = new ExtensionMimeTypeDetector();
//     $fileNames = collect(Storage::disk(config('filesystems.default'))->allFiles());
//     $oldNames = $fileNames->filter(function ($file) use ($detector, $fileNames) {
//         $detectMT = fn ($file) => $detector->detectMimeTypeFromFile($file);
//         $fileIsImg = str_contains($detectMT($file), 'image/');
//         $hasSameMT = ($detectMT($file) === $detectMT('.avif'));
//         $desiredCopyExists = $fileNames->contains(rtrim($file, '.' . File::extension($file)) . '.avif');
//         return ($fileIsImg && !$hasSameMT && !$desiredCopyExists);
//     })->filter();
//     foreach ($oldNames as $oldName) {
//         $builtUrl = (new UrlBuilder(config('imgproxy.base_url'), config('imgproxy.key'), config('imgproxy.salt')))
//             ->build(image($oldName), 0, 0, 'force', 'no', false, 'avif')
//             ->useAdvancedMode()
//             ->toString();
//         $content = Http::get($builtUrl);
//         if ($content->successful()) {
//             $newName = Str::replaceLast(File::extension($oldName), 'avif', $oldName);
//             $saved = Storage::disk(config('voyager.storage.disk'))->put($newName, $content);
//             if ($saved) {
//                 $tables = \DB::connection()->getDoctrineSchemaManager()->listTableNames();
//                 foreach ($tables as $table) {
//                     $columns = \Schema::getColumnListing($table);
//                     $conditions = [];
//                     foreach ($columns as $column) {
//                         $conditions[] = [$column, '=', $oldName];
//                     }
//                     $records = \DB::table($table)->where(function ($q) use ($conditions) {
//                         foreach ($conditions as $condiction) {
//                             $q->orWhere([$condiction]);
//                         }
//                     })->get();
//                     foreach ($records as $record) {
//                         $columns = array_filter((array)$record, function ($r) use ($oldName) {
//                             return $r == $oldName;
//                         });
//                         $update = [];
//                         foreach ($columns as $key => $value) {
//                             $update[$key] = $newName;
//                         }
//                         $updated = \DB::table($table)->where('id', $record->id)->update($update);
//                     }
//                 }
//                 if ($updated) {
//                     Storage::disk(config('voyager.storage.disk'))->delete($oldName);
//                     dump([$oldName => 'Conversion Successful']);
//                 }
//             } else {
//                 dump([$newName => 'Saving Failed']);
//                 continue;
//             }
//         } else dump([$oldName => 'Conversion Failed']);
//     }
// });
// Route::get('/images', function () {
//     $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
//     foreach($tables as $table) {
//         $query = DB::table($table)->get();
//         $records = $query->filter(fn($record) => in_array('social_media\March2022\SVYVtRgnITVXrORrbxQh.png', (array)$record));
//         foreach($records as $record) {
//             $update = [];
//             $attributes = array_filter((array)$record, fn($c)=> $c == 'social_media\March2022\SVYVtRgnITVXrORrbxQh.png');
//             foreach($attributes as $k => $v) $update[$k] = 'social_media\March2022\SVYVtRgnITVXrORrbxQh.avif';
//             dd(DB::table($table)->where(array_search('social_media\March2022\SVYVtRgnITVXrORrbxQh.png', $attributes), 'social_media\March2022\SVYVtRgnITVXrORrbxQh.png')->update($update));
//         }
//     }
// });

Route::get('/image/{img}', function ($img) {
    $content = Storage::disk(config('voyager.storage.disk'))->get(str_replace('|', '/', $img));
    try {
        $img = Image::make($content)->response();
    } catch (Exception $e) {
        $img = $content;
    }
    return $img;
});

Route::get('/imgproxy', function () {
    return Artisan::call('image:convert avif');
});