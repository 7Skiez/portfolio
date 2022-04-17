<?php

namespace App\Listeners;

use App\Events\MenuUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class ClearCachedMenu
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MenuUpdated $event)
    {
        if (config('voyager.menu.cache', false) === true) {
            // Cache::forget('portfolio_menu_' . $event->menu);
            Cache::forget('voyager_menu_' . $event->menu);
        }
    }
}
