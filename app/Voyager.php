<?php

namespace App;

use Exception;
use Illuminate\Support\Facades\Storage;

class Voyager extends \TCG\Voyager\Voyager
{
    public function image($file, $default = '')
    {

        if (!empty($file)) {
            try{
                str_replace('\\', '/', Storage::disk(config('voyager.storage.disk'))->url($file));
            }catch(Exception $e) {
                return parent::image('settings/not-found.jpg', $default);
            }
        }

        return parent::image($file, $default);
    }

}
