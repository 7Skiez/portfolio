<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\Facades\Artisan;
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
        try {
            readlink(public_path('\storage\\'));
        } catch (Exception) {
            Artisan::call('cache:clear');
        }

        !(file_exists(public_path('\storage\\')) ? readlink(public_path('\storage\\')) === storage_path('app\public') : false) ? Artisan::call('storage:link') : null;

        if (function_exists('request') && function_exists('setting')) {
            $requestedUrl = preg_replace("(^https?://)", "", request()->root());

            config([
                'requested_portfolio' => array_filter([
                    'jd' => $requestedUrl === preg_replace("(^https?://)", "", setting('jd.domain')),
                    'ivno' => $requestedUrl === preg_replace("(^https?://)", "", setting('ivno.domain'))
                ])
            ]);

            config(['requested_domain' => setting(key(config('requested_portfolio')) . '.domain')]);

            $portfolioSections = [];

            if (key(config('requested_portfolio')) && menu(key(config('requested_portfolio')))) {

                foreach (menu(key(config('requested_portfolio')), '_json') as $i => $section) {

                    $portfolioSections[$i]['menu'] = $section->title;
                    str_contains($section->title, '*') ? preg_match('/(?<=\*)[^\s]*(?=\s)|(?<=\*).*/', $section->title, $portfolioSections[$i]['id']) : $portfolioSections[$i]['id'] = $section->title;
                    $portfolioSections[$i]['id'] = is_array($portfolioSections[$i]['id']) ? reset($portfolioSections[$i]['id']) : $portfolioSections[$i]['id'];
                    $portfolioSections[$i]['title'] = str_replace('*', '', $section->title);
                }

                config(['portfolioSections' => $portfolioSections]);
            }

            view()->composer('*', function ($view) use ($requestedUrl) {
                $view->with('jd', ($requestedUrl === preg_replace("(^https?://)", "", setting('jd.domain'))));
                $view->with('ivno', ($requestedUrl === preg_replace("(^https?://)", "", setting('ivno.domain'))));

                $view->with('portfolioSections', config('portfolioSections'));
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
