<?php

namespace App\Http\Controllers;

use App\Facades\Portfolio;

class HomeController extends \App\Http\Controllers\Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        !config('portfolioExists') ? abort(404) : null;

        $modelsOrder = array_filter(myMenu(config('ownerUsername'), '_json')->map(fn ($i) => $i->featured ? $i->icon_class : null)->toArray());
        $seo = Portfolio::seo(config('owner'));
        $sections = config('owner')->sections($modelsOrder);

        return view((config('ownerUsername')=='aron'?'aron.main':'app.main'), compact('seo', 'sections'));
    }

    public function data()
    {
        return array_filter([
            'hero_items' => Portfolio::setting(config('ownerUsername') . '.hero_items_degree_rotation') | Portfolio::setting(config('ownerUsername') . '.hero_items_distance_center'),
            'commands' => Portfolio::setting(config('ownerUsername') . '.command_palette'),
            'slider' => array_filter([
                'activeSlide' => config('owner')->projects->search(fn ($i) => $i->active) + 1 ?? 0
            ]),
            'chart' => array_filter([
                'id' => myMenu(config('ownerUsername'), '_json')->where('icon_class', '\App\Models\Skill')->first()->section_id,
                'items' => config('owner')->skills()->featured()->pluck('percentage', 'name'),
                'gradient' => Portfolio::setting(config('ownerUsername') . '.chart_gradient'),
                'roundStrokes' => Portfolio::setting(config('ownerUsername') . '.chart_roundness'),
                'strokeWidth' => Portfolio::setting(config('ownerUsername') . '.chart_stroke_width'),
                'dotRadius' => Portfolio::setting(config('ownerUsername') . '.chart_dot_radius')
            ]),
            'footer' => [
                'flyingIcon' => settingImage('logo')
            ]
        ]);
    }
}
