<?php

namespace App\Http\Controllers\Voyager;

use App\Models\MenuItem;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Http\Controllers\VoyagerMenuController as BaseVoyagerMenuController;

class VoyagerMenuController extends BaseVoyagerMenuController
{
    public function builder($id)
    {
        $dataType = Voyager::model('DataType')->where('slug', '=', 'menus')->first();

        $menu = app($dataType->model_name)->findOrFail($id);

        $this->authorize('edit', $menu);

        $isModelTranslatable = is_bread_translatable(Voyager::model('MenuItem'));

        return Voyager::view('voyager::menus.builder', compact('menu', 'isModelTranslatable'));
    }


    public function delete_menu($menu, $id)
    {
        $item = MenuItem::findOrFail($id);

        Gate::denyIf(fn ($user) => !$user->hasRole('admin'));

        $this->authorize('edit', $item->menu);

        $item->deleteAttributeTranslation('title');

        $item->destroy($id);

        return redirect()
            ->route('voyager.menus.builder', [$menu])
            ->with([
                'message'    => __('voyager::menu_builder.successfully_deleted'),
                'alert-type' => 'success',
            ]);
    }

    public function add_item(Request $request)
    {

        $dataType = Voyager::model('DataType')->where('slug', '=', 'menus')->first();

        $menu = app($dataType->model_name);

        Gate::denyIf(fn ($user) => !$user->hasRole('admin'));

        $this->authorize('edit', $menu);

        $data = $this->prepareParameters(
            $request->all()
        );

        unset($data['id']);
        $data['order'] = Voyager::model('MenuItem')->highestOrderMenuItem();

        // Check if is translatable
        $_isTranslatable = is_bread_translatable(Voyager::model('MenuItem'));
        if ($_isTranslatable) {
            // Prepare data before saving the menu
            $trans = $this->prepareMenuTranslations($data);
        }

        $menuItem = Voyager::model('MenuItem')->create($data);

        // Save menu translations
        if ($_isTranslatable) {
            $menuItem->setAttributeTranslations('title', $trans, true);
        }

        return redirect()
            ->route('voyager.menus.builder', [$data['menu_id']])
            ->with([
                'message'    => __('voyager::menu_builder.successfully_created'),
                'alert-type' => 'success',
            ]);
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

        $menuItem = MenuItem::findOrFail($id);

        $this->authorize('edit', $menuItem->menu);

        if (is_bread_translatable($menuItem)) {
            $trans = $this->prepareMenuTranslations($data);

            // Save menu translations
            $menuItem->setAttributeTranslations('title', $trans, true);
        }

        $menuItem->update($data);

        return redirect()
            ->route('voyager.menus.builder', [$menuItem->menu_id])
            ->with([
                'message'    => __('voyager::menu_builder.successfully_updated'),
                'alert-type' => 'success',
            ]);
    }

    public function toggle_featured(Request $request)
    {
        $id = $request->input('id');

        $menuItem = MenuItem::findOrFail($id);

        $this->authorize('edit', $menuItem->menu);
        
        $menuItem->update(['featured' => $request->input('featured')]);
    }
}
