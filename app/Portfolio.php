<?php

namespace App;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\UnableToReadFile;

class Portfolio extends \TCG\Voyager\Voyager
{
    public function seo(User $owner)
    {
        $headline = $this->setting($owner->username . '.headline');

        if (is_array($headline)) {
            $combos = '';
            foreach ($headline as $h) $combos .= $h[0];
            $headline = $combos;
        }

        $description = $this->setting($owner->username . '.description');

        return (object)[
            'title'         => $headline,
            'subheadline'   => $this->setting($owner->username . '.subheadline'),
            'description'   => htmlspecialchars_decode(toOneLine(removeTags($description))),
            'image'         => $owner->avatar,
            'type'          => 'website'
        ];
    }

    public function setting($key, $default = null)
    {
        $globalCache = config('voyager.settings.cache', false);

        if ($globalCache && Cache::tags('settings')->has($key)) {
            return Cache::tags('settings')->get($key);
        }

        if ($this->setting_cache === null) {
            if ($globalCache) {
                // A key is requested that is not in the cache
                // this is a good opportunity to update all keys
                // albeit not strictly necessary
                Cache::tags('settings')->flush();
            }

            foreach (self::model('Setting')->orderBy('order')->get() as $setting) {
                $keys = explode('.', $setting->key);

                $details = $setting->details ? json_decode($setting->details) : null;

                if (!empty($details->prepare)) {

                    preg_match_all('/(?<=(?<!\\\)&lt;-).*?(?=(?<!\\\)-&gt;)/', $setting->value, $matches);

                    $value = reset($matches);

                    if (!empty($details->split)) {
                        $value = array_map(function ($i) {
                            if (str_contains($i, '=')) {
                                return preg_split('/(?<!\\\)=/', $i);
                            }
                        }, $value);
                    }

                    $value ? $setting->value = $value : null;
                }

                @$this->setting_cache[$keys[0]][$keys[1]] = $setting->value;

                if ($globalCache) {
                    Cache::tags('settings')->forever($setting->key, $setting->value);
                }
            }
        }

        $parts = explode('.', $key);

        if (count($parts) == 2) {
            return @$this->setting_cache[$parts[0]][$parts[1]] ?: $default;
        } else {
            return @$this->setting_cache[$parts[0]] ?: $default;
        }
    }

    public function image($file, $default = '')
    {
        if (!empty($file)) {
            return Cache::rememberForever($file, function () use ($file, $default) {
                try {
                    return Storage::disk(config('voyager.storage.disk'))->url(str_replace('\\', '/', $file));
                } catch (UnableToReadFile $e) {}
            });
        }
        return $default;
    }

    function myMenu($menuName, $type = null, array $options = [])
    {
        return $this->model('Menu')->display($menuName, $type, $options)->transform(function ($i) {
            str_contains($i->title, '*') ? preg_match('/(?<=\*)[^\s]*(?=\s)|(?<=\*).*/', $i->title, $sectionId) : $sectionId = $i->title;
            $i->section_id = is_array($sectionId) ? reset($sectionId) : $sectionId;
            $i->title = str_replace('*', '', $i->title);
            if ($i->parameters) {
                $newParameters = json_decode(json_encode($i->parameters));
                foreach ($newParameters as $key => $param) {
                    if (str_starts_with($param, '*')) {
                        eval(ltrim($param, '*\\'));
                        preg_match('/(?<=\$).*?(?=\=)/', $param, $var);
                        $newParameters->$key = ${$var[0]};
                        $i->parameters = json_encode($newParameters);
                        $i->href = route($i->route, (array)$i->parameters, true);
                    }
                }
            }
            return $i;
        })->filter();
    }

    function fixPostgresSequence()
    {
        if (config('database.default') === 'pgsql') {
            $tables = \DB::select('SELECT table_name FROM information_schema.tables WHERE table_schema = \'public\' ORDER BY table_name;');
            foreach ($tables as $table) {
                if (\Schema::hasColumn($table->table_name, 'id')) {
                    $seq = \DB::table($table->table_name)->max('id') + 1;
                    \DB::select('SELECT setval(pg_get_serial_sequence(\'' . $table->table_name . '\', \'id\'), coalesce(' . $seq . ',1), false) FROM ' . $table->table_name);
                }
            }
        }
    }
}
