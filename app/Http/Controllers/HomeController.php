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
        preg_match_all('/(?<=--).*?(?=--)/', setting($p.'_headline'), $headline);
        $headlineCombo = array_map(fn($i) => explode("=", $i), $headline[0]);
        $headline = '';
        foreach($headlineCombo as $combo)$headline .= $combo[0];

        ($p === 'ivno') ? $description = preg_replace('/(\r\n|\n|\r)/', ' ', preg_replace('/(<([^>]+)>)/','', setting('ivno_description'))) : $description = ''; 

        return (object)[
            'title'         => $headline,
            'subheadline'   => setting($p . '_subheadline'),
            'description'   => $description,
            'image'         => User::where('username', '=', $p)->firstOrFail()->avatar,
            'type'          => 'website'
        ];
    }

    protected function portfolio($p)
    {
        $portfolio = [
            'domain_name' => setting($p . '_domain_name'),
            'profile_pic' => User::where('username', '=', $p)->firstOrFail()->avatar,
            'hero_items' => setting($p . '_hero_items'),
            'bg_color' => setting($p . '_bg_color'),
            'accent_color' => setting($p . '_accent_color'),
            'logo' => setting($p . '_logo'),
            'headline' => setting($p . '_headline'),
            'subheadline' => setting($p . '_subheadline'),
            'description' => setting($p . '_description'),
            'projects_title' => setting($p . '_projects_title'),
            'skills_title' => setting($p . '_skills_title'),
            'certification_title' => setting($p . '_certification_title'),
            'owner_id' => User::where('username', '=', $p)->firstOrFail()->id,
            'contacts' => setting($p . '_contact_me'),
        ];

        return (object) array_merge($portfolio, [
            'projects' => Project::where('owner_id', '=', $portfolio['owner_id'])->where('featured', '!=', false)->orderBy('order', 'asc')->get(),
            'media' => Medium::where('owner_id', '=', $portfolio['owner_id'])->where('featured', '!=', false)->orderBy('order', 'desc')->get(),
            'skills' => Skill::where('owner_id', '=', $portfolio['owner_id'])->where('featured', '!=', false)->orderBy('order', 'desc')->get(),
            'certifications' => Certification::where('owner_id', '=', $portfolio['owner_id'])->where('featured', '!=', false)->orderBy('order', 'desc')->get(),
            'tools' => Tool::where('owner_id', '=', $portfolio['owner_id'])->where('featured', '!=', false)->orderBy('order', 'desc')->get()
        ]);
    }

    public function index()
    {
        if (empty(config('requested_portfolio'))) abort(404);

        return view('layouts.app')->with('seo', $this->seo)->with('portfolio', $this->portfolio);
    }

    function data()
    {
        $portfolioSections = config('portfolioSections');

        foreach (menu(key(config('requested_portfolio')), '_json') as $i => $v) {
            $v->icon_class == 'skills' ? $id = $portfolioSections[$i]['id'] : null;
        }

        $activeSlide = Project::where('owner_id', '=', $this->portfolio->owner_id)->where('featured', '!=', false)->where('active', '=', 1)->first();

        return [
            'slider' => [
                'activeSlide' => $activeSlide ? $activeSlide->order : 2
            ],
            'radarChart' => [
                'id' => $id,
                'skills' => $this->portfolio->skills->pluck('percentage', 'name'),
                'colors' => [setting($this->portfolioOwner . '_radar_color_one'), setting($this->portfolioOwner . '_radar_color_two')],
                'roundStrokes' => setting($this->portfolioOwner . '_radar_roundstrokes')
            ]
        ];
    }
}
