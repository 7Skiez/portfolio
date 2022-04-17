<?php

namespace App\Http\Controllers\Voyager;

use App\Events\MenuUpdated;
// use App\Models\MenuItem;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Http\Controllers\VoyagerMenuController as BaseVoyagerMenuController;

class VoyagerMenuController extends BaseVoyagerMenuController
{
    public function builder($id)
    {
        $dataType = Voyager::model('DataType')->where('slug', '=', 'menus')->first();

        $model = app($dataType->model_name);

        $this->authorize('edit', $model);

        $query = $model->query();

        if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope' . ucfirst($dataType->scope))) {

            $query = $query->{$dataType->scope}();

        }

        $menu = $query->findOrFail($id);
        
        $isModelTranslatable = is_bread_translatable(Voyager::model('MenuItem'));
        return Voyager::view('voyager::menus.builder', compact('menu', 'isModelTranslatable'));

    }

    public function order_item(Request $request)
    {
        $menuItemOrder = json_decode($request->input('order'));

        $this->orderMenu($menuItemOrder, null);

        $menuItem = Voyager::model('MenuItem')->findOrFail($menuItemOrder[0]->id);
        
        event(new MenuUpdated($menuItem));
    }

    private function orderMenu(array $menuItems, $parentId)
    {
        foreach ($menuItems as $index => $menuItem) {
            $item = Voyager::model('MenuItem')->findOrFail($menuItem->id);
            $item->order = $index + 1;
            $item->parent_id = $parentId;
            $item->save();

            if (isset($menuItem->children)) {
                $this->orderMenu($menuItem->children, $item->id);
            }
        }
    }

    public function update_item(Request $request)
    {
        $id = $request->input('id');

        Auth::user()->hasRole('admin') ?
            $data = $this->prepareParameters(
                $request->except(['id'])
            ) :
            $data = $this->prepareParameters(
                $request->except(['id', 'route', 'parameters', 'icon_class', 'color', 'target', 'menu_id'])
            );

        $menuItem = Voyager::model('MenuItem')->findOrFail($id);

        $this->authorize('edit', $menuItem->menu);

        if (is_bread_translatable($menuItem)) {
            $trans = $this->prepareMenuTranslations($data);

            // Save menu translations
            $menuItem->setAttributeTranslations('title', $trans, true);
        }

        $menuItem->update($data);

        event(new MenuUpdated($menuItem));
        
        return redirect()
            ->route('voyager.menus.builder', [$menuItem->menu_id])
            ->with([
                'message'    => __('voyager::menu_builder.successfully_updated'),
                'alert-type' => 'success',
            ]);
    }

    public function feature_toggle(Request $request)
    {
        $id = json_decode($request->input('id'));

        $menuItem = Voyager::model('MenuItem')->findOrFail($id);

        $this->authorize('edit', $menuItem->menu);

        $res = $menuItem->toggleFeature([$id]);

        if($res) event(new MenuUpdated($menuItem));

        return $res ?
            [
                'message' => $menuItem->title . ' visibility updated',
                'alert-type' => 'success',
            ] :
            [
                'message' => $menuItem->title . ' visibility couldn\'t be updated',
                'alert-type' => 'error',
            ];
    }
}
