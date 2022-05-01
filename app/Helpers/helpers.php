<?php

if (!function_exists('toOneLine')) {
    function toOneLine($string)
    {
        return preg_replace('/\s\s+/', ' ', $string);
    }
}

if (!function_exists('removeTags')) {
    function removeTags($string)
    {
        return preg_replace('/(<([^>]+)>)/', '', $string);
    }
}

if (!function_exists('removeProtocol')) {
    function removeProtocol($string)
    {
        return preg_replace('(^https?://)', '', $string);
    }
}

if (!function_exists('seo')) {
    function seo(App\Models\User $owner)
    {
        return App\Facades\Portfolio::seo($owner);
    }
}

if (!function_exists('image')) {
    function image($file, $default = '')
    {
        return App\Facades\Portfolio::image($file, $default);
    }
}

if (!function_exists('settingImage')) {
    function settingImage($file, $default = '')
    {
        return App\Facades\Portfolio::image(App\Facades\Portfolio::setting(config('ownerUsername') . '.' . $file, $default));
    }
}

if (!function_exists('myMenu')) {
    function myMenu($menuName, $type = null, array $options = [])
    {
        return App\Facades\Portfolio::myMenu($menuName, $type, $options);
    }
}

if (!function_exists('fixPostgresSequence')) {
    function fixPostgresSequence()
    {
        return App\Facades\Portfolio::fixPostgresSequence();
    }
}

if (!function_exists('listCachedKeys')) {
    function listCachedKeys()
    {
        $storage = Cache::getStore(); // will return instance of FileStore
        $filesystem = $storage->getFilesystem(); // will return instance of Filesystem
        $dir = (\Cache::getDirectory());
        $keys = [];
        foreach ($filesystem->allFiles($dir) as $file1) {
            if (is_dir($file1->getPath())) {
                foreach ($filesystem->allFiles($file1->getPath()) as $file2) {
                    $keys = array_merge($keys, [$file2->getRealpath() => unserialize(substr(\File::get($file2->getRealpath()), 10))]);
                }
            }
        }
        return $keys;
    }
}

if (!function_exists('api_endpoint')) {
    function api_endpoint($view)
    {
        return \Cache::remember('api.'.$view, now()->addMinutes(60), function () {
            return \Str::random(32);
        });
    }
}