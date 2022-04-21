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
        $modelsOrder = array_filter(myMenu(config('ownerUsername'), '_json')->map(fn ($i) => $i->featured ? $i->icon_class : null)->toArray());
        $seo = Portfolio::seo(config('owner'));
        $sections = config('owner')->sections($modelsOrder);
        return view('app.main', compact('seo', 'sections'));
    }

    public function data()
    {
        return [
            'slider' => [
                'activeSlide' => config('owner')->projects->search(fn ($i) => $i->active) + 1 ?? 0
            ],
            'radarChart' => [
                'id' => myMenu(config('ownerUsername'), '_json')->where('icon_class', '\App\Models\Skill')->first()->section_id,
                'radarItems' => config('owner')->skills()->featured()->pluck('percentage', 'name'),
                'gradient' => Portfolio::setting(config('ownerUsername') . '.radar_area_gradient'),
                'roundStrokes' => Portfolio::setting(config('ownerUsername') . '.radar_area_roundstrokes'),
                'strokeWidth' => Portfolio::setting(config('ownerUsername') . '.radar_stroke_width'),
                'dotRadius' => Portfolio::setting(config('ownerUsername') . '.radar_dot_radius')
            ]
        ];
    }
}
