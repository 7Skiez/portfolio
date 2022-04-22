<?php

namespace App\Providers;

use App\Models\User;
use App\Portfolio;
use App\Facades\Portfolio as PortfolioFacade;
use Exception;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

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

        $loader = AliasLoader::getInstance();
        $loader->alias('Portfolio', PortfolioFacade::class);

        $this->app->singleton('portfolio', function () {
            return new Portfolio();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Voyager::useModel('Menu', \App\Models\Menu::class);
        Voyager::useModel('MenuItem', \App\Models\MenuItem::class);

        if (config('voyager.storage.disk') === 'public') {
            try {
                readlink(public_path('\storage\\'));
            } catch (Exception $e) {
                Artisan::call('cache:clear');
            }
            !(file_exists(public_path('\storage\\')) ? readlink(public_path('\storage\\')) === storage_path('app\public') : false) ? Artisan::call('storage:link') : null;
        }

        if (Schema::hasTable('settings')) {
            $url = request()->root();
            $portfolio = Voyager::model('Setting')->where('key', 'like', '%.domain')->where('value', 'like', $url)->first();
            if ($portfolio) {
                config(['owner' => User::where('username', '=', $portfolio->group)->first()]);
                config(['ownerUsername' => config('owner')->username]);
                config(['ownerMenu' => myMenu(config('ownerUsername'), '_json')]);

                view()->composer('*', function ($view) use ($url) {
                    $view->with('jd', $url === setting('jd.domain'));
                    $view->with('ivno', $url === setting('ivno.domain'));
                    $view->with('menuItems', config('ownerMenu')->where('featured', 1));
                });
            }
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
