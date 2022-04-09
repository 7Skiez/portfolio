<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadHelpers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('voyager.storage.disk') === 'public') {
            try {
                readlink(public_path('\storage\\'));
            } catch (Exception) {
                Artisan::call('cache:clear');
            }

            !(file_exists(public_path('\storage\\')) ? readlink(public_path('\storage\\')) === storage_path('app\public') : false) ? Artisan::call('storage:link') : null;
        }

        if (function_exists('request') && function_exists('setting') && Schema::hasTable('settings')) {
            $requested_url = preg_replace("(^https?://)", "", request()->root());

            config([
                'requested_portfolio' => array_filter([
                    'jd' => $requested_url === preg_replace("(^https?://)", "", setting('jd.domain')),
                    'ivno' => $requested_url === preg_replace("(^https?://)", "", setting('ivno.domain'))
                ])
            ]);

            $portfolioOwner = key(config('requested_portfolio'));

            config(['requested_domain' => setting($portfolioOwner . '.domain')]);

            $sections = [];

            if (config('requested_portfolio') && menu($portfolioOwner)) {
                foreach (myMenu($portfolioOwner, '_json') as $i => $section) {
                    $sections[$i]['menu'] = $section->title;
                    str_contains($section->title, '*') ? preg_match('/(?<=\*)[^\s]*(?=\s)|(?<=\*).*/', $section->title, $sections[$i]['id']) : $sections[$i]['id'] = $section->title;
                    $sections[$i]['id'] = is_array($sections[$i]['id']) ? reset($sections[$i]['id']) : $sections[$i]['id'];
                    $sections[$i]['title'] = str_replace('*', '', $section->title);
                }
            }

            config(['sections' => $sections]);

            view()->composer('*', function ($view) use ($requested_url, $sections) {
                $view->with('jd', $requested_url === preg_replace("(^https?://)", "", setting('jd.domain')));
                $view->with('ivno', $requested_url === preg_replace("(^https?://)", "", setting('ivno.domain')));

                $view->with('sections', $sections);
            });
        }
    }

    /**
     * Load helpers.
     */
    protected function loadHelpers()
    {
        foreach (glob(__DIR__ . '/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
