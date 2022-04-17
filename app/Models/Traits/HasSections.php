<?php

namespace App\Models\Traits;

use App\Facades\Portfolio;
use ErrorException;
use Exception;
use Illuminate\Database\Eloquent\Relations\Relation;
use ReflectionClass;
use ReflectionMethod;

trait HasSections
{
    public function sections(array $modelsOrder = [])
    {
        $modelInstances = [];

        foreach ($modelsOrder as $model) {

            try {
                $model = app($model);

                foreach ((new ReflectionClass($model))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                    if (
                        $method->class != get_class($model) ||
                        !empty($method->getParameters()) ||
                        $method->getName() == __FUNCTION__
                    ) { continue;}
                    try {
                        $return = $method->invoke($model);
                        if ($return instanceof Relation) {
                            $type = (new ReflectionClass($return))->getShortName();
                            $related = (new ReflectionClass($return->getRelated()))->getName();
                            if (str_starts_with($type, 'Belongs') && $related == get_class($this)) {
                                $modelInstances[$model->getTable()] = (object)[
                                    'id' => config('ownerMenu')->where('icon_class', '\\' . get_class($model))->first()->section_id,
                                    'title' => config('ownerMenu')->where('icon_class', '\\' . get_class($model))->first()->title,
                                    'subheadline' =>  config('ownerMenu')->where('icon_class', '\\' . get_class($model))->first()->url,
                                    'items' => $model->whereBelongsTo($this)->featured()->get()
                                ];
                            }
                        }
                    } catch (ErrorException $e) {}
                }
 
            } catch (Exception $e) {

                if(config('ownerMenu')->where('icon_class', 'like', $model)->first()) {
                    $modelInstances[$model] = (object)[
                        'id' =>  config('ownerMenu')->where('icon_class', 'like', $model)->first()->section_id,
                        'title' =>  config('ownerMenu')->where('icon_class', 'like', $model)->first()->title,
                        'subheadline' =>  config('ownerMenu')->where('icon_class', 'like', $model)->first()->url,
                        'items' => Portfolio::setting(config('ownerUsername') . '.' . $model)
                    ];
                }
            }
        }

        return $modelInstances;
    }
}
