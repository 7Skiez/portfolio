<?php

namespace App\Traits;

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
                        }
                    } catch (ErrorException $e) {}
                }
                
            } catch (Exception $e) {}
        }

        return $modelInstances;
    }
}
