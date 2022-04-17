<?php

namespace App\Models\Traits;

use App\Facades\Portfolio;
use ErrorException;
use Exception;
use Illuminate\Database\Eloquent\Relations\Relation;
use ReflectionClass;
use ReflectionMethod;

trait HasBelongings
{
    public function belongings()
    {
        $composer = json_decode(file_get_contents(base_path('composer.json')), true);
        $models = [];
        foreach ((array)data_get($composer, 'autoload.psr-4') as $namespace => $path) {
            $models = array_merge(collect(\File::allFiles(base_path($path)))
                ->map(function ($item) use ($namespace) {
                    $path = $item->getRelativePathName();
                    return sprintf(
                        '\%s%s',
                        $namespace,
                        strtr(substr($path, 0, strrpos($path, '.')), '/', '\\')
                    );
                })
                ->filter(function ($class) {
                    $valid = false;
                    if (class_exists($class)) {
                        $reflection = new \ReflectionClass($class);
                        $valid = $reflection->isSubclassOf(\Illuminate\Database\Eloquent\Model::class) &&
                            !$reflection->isAbstract();
                    }
                    return $valid;
                })
                ->values()
                ->toArray(), $models);
        }

        $modelInstances = [];

        foreach ($models as $model) {

            try {
                $model = app($model);

                $relationships = [];

                foreach ((new ReflectionClass($model))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                    if (
                        $method->class != get_class($model) ||
                        !empty($method->getParameters()) ||
                        $method->getName() == __FUNCTION__
                    ) {
                        continue;
                    }
                    try {
                        $return = $method->invoke($model);
                        if ($return instanceof Relation) {

                            $type = (new ReflectionClass($return))->getShortName();
                            $related = (new ReflectionClass($return->getRelated()))->getName();
  
                            if (str_starts_with($type, 'Belongs') && $related == get_class($this)) {
                                $modelInstances[] = $model->whereBelongsTo($this)->get();
                            }

                            /** 
                             * Using Collection:  
                             * 
                                $relationships[] = [
                                    'model' => get_class($model),
                                    'name' => $method->getName(),
                                    'type' => (new ReflectionClass($return))->getShortName(),
                                    'related' => (new ReflectionClass($return->getRelated()))->getName()
                                ];
                                $belongingModel = collect($relationships)->where('type', 'like', 'BelongsTo')->where('related', get_class($this))->first()['model'];
                                $modelInstances[] = app($belongingModel)->all();
                            */

                        }
                    } catch (ErrorException $e) {}
                }
                
            } catch (Exception $e) {}
        }

        return $modelInstances;
    }
}
