<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Medium;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Tool;
use App\Models\User;

class HomeController extends \App\Http\Controllers\Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    protected $portfolioOwner;
    protected $seo;
    protected $portfolio;

    public function __construct()
    {
        if (empty(config('requested_portfolio'))) abort(404);

        $this->portfolioOwner = key(config('requested_portfolio'));
        $this->seo = $this->seo($this->portfolioOwner);
        $this->portfolio = $this->portfolio($this->portfolioOwner);
    }

    protected function seo($p)
    {
        preg_match_all('/(?<=--).*?(?=--)/', setting($p . '.headline'), $headline);
        $headlineCombo = array_map(fn ($i) => explode("=", $i), $headline[0]);
        $headline = '';
        foreach ($headlineCombo as $combo) $headline .= $combo[0];

        ($p === 'ivno') ? $description = preg_replace('/(\r\n|\n|\r)/', ' ', preg_replace('/(<([^>]+)>)/', '', setting('ivno.description'))) : $description = '';

        return (object)[
            'title'         => $headline,
            'subheadline'   => setting($p . '.subheadline'),
            'description'   => $description,
            'image'         => User::where('username', '=', $p)->firstOrFail()->avatar,
            'type'          => 'website'
        ];
    }

    protected function portfolio($p)
    {
        $portfolio = [
            'domain_name' => setting($p . '.domain_name'),
            'profile_pic' => User::where('username', '=', $p)->firstOrFail()->avatar,
            'hero_items' => setting($p . '.hero_items'),
            'bg_color' => setting($p . '.bg_color'),
            'accent_color' => setting($p . '.accent_color'),
            'logo' => setting($p . '.logo'),
            'headline' => setting($p . '.headline'),
            // 'subheadline' => setting($p . '.subheadline'),
            'description' => setting($p . '.description'),
            'projects_title' => setting($p . '.projects_title'),
            'skills_title' => setting($p . '.skills_title'),
            'certification_title' => setting($p . '.certification_title'),
            'owner_id' => User::where('username', '=', $p)->firstOrFail()->id,
            'contacts' => setting($p . '.contact_me'),
        ];

        return (object) array_merge($portfolio, [
            'projects' => Project::where('owner_id', '=', $portfolio['owner_id'])->where('featured', true)->orderBy('order', 'asc')->get(),
            'media' => Medium::where('owner_id', '=', $portfolio['owner_id'])->where('featured', true)->orderBy('order', 'desc')->get(),
            'skills' => Skill::where('owner_id', '=', $portfolio['owner_id'])->where('featured', true)->orderBy('order', 'asc')->get(),
            'certifications' => Certification::where('owner_id', '=', $portfolio['owner_id'])->where('featured', true)->orderBy('order', 'desc')->get(),
            'tools' => Tool::where('owner_id', '=', $portfolio['owner_id'])->where('featured', true)->orderBy('order', 'desc')->get()
        ]);
    }

    public function index()
    {
        if (empty(config('requested_portfolio'))) abort(404);

        return view('layouts.app')->with('seo', $this->seo)->with('portfolio', $this->portfolio);
    }

    function data()
    {

        foreach (myMenu($this->portfolioOwner, '_json') as $i => $v) {
            $v->icon_class == 'skills' ? $id = config('sections')[$i]['id'] : null;
        }

        return [
            'slider' => [
                'activeSlide' => $this->portfolio->projects->search(fn($i) => $i->active) +1 ?? 0
            ],
            'radarChart' => [
                'id' => $id,
                'radarItems' => $this->portfolio->skills->pluck('percentage', 'name'),
                'gradient' => setting($this->portfolioOwner .'.radar_area_gradient'),
                'roundStrokes' => setting($this->portfolioOwner . '.radar_area_roundstrokes'),
                'strokeWidth' => setting($this->portfolioOwner . '.radar_stroke_width'),
                'dotRadius' => setting($this->portfolioOwner . '.radar_dot_radius')
            ]
        ];
    }
}
