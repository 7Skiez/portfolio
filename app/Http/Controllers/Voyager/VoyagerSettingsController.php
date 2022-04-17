<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerSettingsController as BaseVoyagerSettingsController;

class VoyagerSettingsController extends BaseVoyagerSettingsController
{
    public function index()
    {
        // Check permission
        $this->authorize('browse', Voyager::model('Setting'));

        Auth::user()->hasRole('admin') ?
            $data = Voyager::model('Setting')->orderBy('order', 'ASC')->get() :
            $data = Voyager::model('Setting')->where('group', Auth::user()->username)->orderBy('order', 'ASC')->get();

        $settings = [];
        $settings[__('voyager::settings.group_general')] = [];
        foreach ($data as $d) {
            if ($d->group == '' || $d->group == __('voyager::settings.group_general')) {
                $settings[__('voyager::settings.group_general')][] = $d;
            } else {
                $settings[$d->group][] = $d;
            }
        }
        if (count($settings[__('voyager::settings.group_general')]) == 0) {
            unset($settings[__('voyager::settings.group_general')]);
        }

        $groups_data = Auth::user()->hasRole('admin') ?
            Voyager::model('Setting')->select('group')->distinct()->get() :
            Voyager::model('Setting')->where('group', Auth::user()->username)->select('group')->distinct()->get();
        $groups = [];
        foreach ($groups_data as $group) {
            if ($group->group != '') {
                $groups[] = $group->group;
            }
        }

        $active = (request()->session()->has('setting_tab')) ? request()->session()->get('setting_tab') : old('setting_tab', key($settings));

        return Voyager::view('voyager::settings.index', compact('settings', 'groups', 'active'));
    }

    public function colors()
    {
        $this->authorize('browse', Voyager::model('Setting'));
        return Voyager::model('Setting')->where(function ($query) {
            return Auth::user()->hasRole('admin') ? $query : $query->where('group', Auth::user()->username);
        })->whereIn('type', ['color', 'gradient'])->orderBy('order', 'ASC')->select('key', 'type', 'value')->get();
    }

    public function update(Request $request)
    {
        // Check permission
        $this->authorize('edit', Voyager::model('Setting'));

        $settings = Auth::user()->hasRole('admin') ?
            Voyager::model('Setting')->all() :
            Voyager::model('Setting')->where('group', Auth::user()->username)->get();

        foreach ($settings as $setting) {
            $content = $this->getContentBasedOnType($request, 'settings', (object) [
                'type'    => $setting->type,
                'field'   => str_replace('.', '_', $setting->key),
                'group'   => $setting->group,
            ], json_decode($setting->details));

            if ($setting->type == 'image' && $content == null) {
                continue;
            }

            if ($setting->type == 'file' && $content == null) {
                continue;
            }

            if ($setting->value && ($setting->type == 'image' || $setting->type == 'file')) {
                if (Storage::disk(config('voyager.storage.disk'))->exists($setting->value))
                    Storage::disk(config('voyager.storage.disk'))->delete($setting->value);
            }

            if (Auth::user()->hasRole('admin')) {
                $key = preg_replace('/^' . \Str::slug($setting->group) . './i', '', $setting->key);

                $setting->group = $request->input(str_replace('.', '_', $setting->key) . '_group');
                $setting->key = implode('.', [\Str::slug($setting->group), $key]);
            }

            $setting->value = $content;
            $setting->save();
        }

        request()->flashOnly('setting_tab');

        return back()->with([
            'message'    => __('voyager::settings.successfully_saved'),
            'alert-type' => 'success',
        ]);
    }
}
