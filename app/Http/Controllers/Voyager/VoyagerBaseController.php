<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;

class VoyagerBaseController extends BaseVoyagerBaseController
{
    /**
     * Order BREAD items.
     *
     * @param string $table
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function order(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));

        if (empty($dataType->order_column) || empty($dataType->order_display_column)) {
            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::bread.ordering_not_set'),
                    'alert-type' => 'error',
                ]);
        }

        $model = app($dataType->model_name);
        $query = $model->query();
        if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope' . ucfirst($dataType->scope))) {
            $query = $query->{$dataType->scope}();
        }
        if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
            $query = $query->withTrashed();
        }
        $results = $query->orderBy($dataType->order_column, $dataType->order_direction)->get();

        $display_column = $dataType->order_display_column;

        $dataRow = Voyager::model('DataRow')->whereDataTypeId($dataType->id)->whereField($display_column)->first();

        $view = 'voyager::bread.order';

        if (view()->exists("voyager::$slug.order")) {
            $view = "voyager::$slug.order";
        }

        return Voyager::view($view, compact(
            'dataType',
            'display_column',
            'dataRow',
            'results'
        ));
    }

    public function feature_toggle(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Init array of IDs
        $ids = $request->ids;

        foreach ($ids as $id) {
            $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
            // Check permission
            $this->authorize('edit', $data);
        }

        $displayName = count($ids) > 1 ? $dataType->getTranslatedAttribute('display_name_plural') : $dataType->getTranslatedAttribute('display_name_singular');

        $res = $data->toggleFeature($ids);
        $data = $res
            ? [
                'message'    => strtolower($displayName).' visibility updated',
                'alert-type' => 'success',
            ]
            : [
                'message'    => 'Sorry there was a problem trying to update visibility for selected '. strtolower($displayName),
                'alert-type' => 'error',
            ];

        if ($res) {
            event(new BreadDataUpdated($dataType, $data));
        }

        return $data;
    }

    public function set_active(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $model = app($dataType->model_name);

        $id = $request->id;

        $data = $model->query()->find($id)->firstOrFail();

        $this->authorize('edit', $data);

        method_exists($model, 'setActive') ? $data->setActive($id) : null;
        
        $res = $data->update(['active' => (int)!$data->active]);

        $displayName = $dataType->getTranslatedAttribute('display_name_singular');

        $data = $res
            ? [
                'message'    => strtolower($displayName).' set to active slide',
                'alert-type' => 'success',
            ]
            : [
                'message'    => 'Sorry there was a problem setting the '. strtolower($displayName) . ' to active slide',
                'alert-type' => 'error',
            ];

        if ($res) {
            event(new BreadDataUpdated($dataType, $data));
        }

        return $data;
    }
}
