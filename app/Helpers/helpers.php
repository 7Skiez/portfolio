<?php

if (!function_exists('myMenu')) {
    function myMenu($menuName, $type = null, array $options = [])
    {
        return App\Models\Menu::display($menuName, $type, $options)->transform(function ($i) {
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
        });
    }
}