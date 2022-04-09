<?php

if (!function_exists('image')) {
    function image($file, $default = '')
    {
        if (!empty($file)) {
            try{
                return \Storage::disk(config('voyager.storage.disk'))->url(str_replace('\\', '/', $file));
            }catch(Exception $e) {
                
            }
        }

        return $default;
    }
}


if (!function_exists('myMenu')) {
    function myMenu($menuName, $type = null, array $options = [])
    {
        return App\Models\Menu::display($menuName, $type, $options)->transform(function ($i) {
            if ($i->featured) {
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
            }
        })->filter();
    }
}

if (!function_exists('fixPostgresSequence')) {

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
