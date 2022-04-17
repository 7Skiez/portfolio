<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'site.title',
                'display_name' => 'Site Title',
                'value' => 'Site Title',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Site',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'site.description',
                'display_name' => 'Site Description',
                'value' => 'Site Description',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Site',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'site.logo',
                'display_name' => 'Site Logo',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 4,
                'group' => 'Site',
            ),
            3 => 
            array (
                'id' => 5,
                'key' => 'admin.bg_image',
                'display_name' => 'Admin Background Image',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 5,
                'group' => 'Admin',
            ),
            4 => 
            array (
                'id' => 6,
                'key' => 'admin.title',
                'display_name' => 'Admin Title',
                'value' => 'Voyager',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            5 => 
            array (
                'id' => 7,
                'key' => 'admin.description',
                'display_name' => 'Admin Description',
                'value' => 'Welcome to Voyager. The Missing Admin for Laravel',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Admin',
            ),
            6 => 
            array (
                'id' => 8,
                'key' => 'admin.loader',
                'display_name' => 'Admin Loader',
                'value' => 'settings\\April2022\\QRzcOB7aDSclRJ95rcDM.png',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Admin',
            ),
            7 => 
            array (
                'id' => 9,
                'key' => 'admin.icon_image',
                'display_name' => 'Admin Icon Image',
                'value' => 'settings\\April2022\\Y0K0muClClEPBm1t0MIE.png',
                'details' => '',
                'type' => 'image',
                'order' => 4,
                'group' => 'Admin',
            ),
            8 => 
            array (
                'id' => 10,
                'key' => 'admin.google_analytics_client_id',
            'display_name' => 'Google Analytics Client ID (used for admin dashboard)',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            9 => 
            array (
                'id' => 11,
                'key' => 'ivno.domain',
                'display_name' => 'Domain',
                'value' => 'http://127.0.0.1:39',
                'details' => NULL,
                'type' => 'text',
                'order' => 6,
                'group' => 'ivno',
            ),
            10 => 
            array (
                'id' => 12,
                'key' => 'ivno.bg_color',
                'display_name' => 'Background Color',
            'value' => 'radial-gradient(circle at center, rgba(255, 255, 255, 0.1) 2.00px,rgb(12, 4, 27) 10.00%)',
                'details' => NULL,
                'type' => 'gradient',
                'order' => 7,
                'group' => 'ivno',
            ),
            11 => 
            array (
                'id' => 13,
                'key' => 'ivno.profile_bg_image',
                'display_name' => 'Profile Background Image',
                'value' => 'settings\\April2022\\RqsU9eUw7xaFRrD00cPK.png',
                'details' => '{"resize":{"width":"256","height":null},"quality":"80%","upsize":true}',
                'type' => 'image',
                'order' => 8,
                'group' => 'ivno',
            ),
            12 => 
            array (
                'id' => 14,
                'key' => 'ivno.main_gradient',
                'display_name' => 'Main Gradient',
            'value' => 'linear-gradient(315deg, #2D0E68 0%, #5334DA 14.27%, #5396EC 56.98%, #54FFFF 100%)',
                'details' => NULL,
                'type' => 'gradient',
                'order' => 10,
                'group' => 'ivno',
            ),
            13 => 
            array (
                'id' => 15,
                'key' => 'ivno.accent_bg_color',
                'display_name' => 'Accent Background Color',
            'value' => 'rgb(34, 20, 60)',
                'details' => NULL,
                'type' => 'color',
                'order' => 9,
                'group' => 'ivno',
            ),
            14 => 
            array (
                'id' => 16,
                'key' => 'ivno.accent_text_color',
                'display_name' => 'Accent Text Color',
            'value' => 'rgb(255, 255, 255)',
                'details' => NULL,
                'type' => 'color',
                'order' => 11,
                'group' => 'ivno',
            ),
            15 => 
            array (
                'id' => 17,
                'key' => 'ivno.logo',
                'display_name' => 'Logo',
                'value' => 'settings\\April2022\\PXaEA6BymFGiJwWbSLJm.png',
                'details' => '{"resize":{"width":"64","height":null},"quality":"100%","upsize":true}',
                'type' => 'image',
                'order' => 12,
                'group' => 'ivno',
            ),
            16 => 
            array (
                'id' => 18,
                'key' => 'ivno.logo_rotation',
                'display_name' => 'Logo Rotation',
                'value' => '1',
                'details' => NULL,
                'type' => 'checkbox',
                'order' => 13,
                'group' => 'ivno',
            ),
            17 => 
            array (
                'id' => 19,
                'key' => 'ivno.headline',
                'display_name' => 'Headline',
                'value' => '<p>&lt;-I=n-&gt;</p>
<p>&lt;-V=e-&gt;</p>
<p>&lt;-N=t-&gt;</p>
<p>&lt;-O=r-&gt;</p>',
                'details' => '{"prepare":true,"split":true}',
                'type' => 'rich_text_box',
                'order' => 14,
                'group' => 'ivno',
            ),
            18 => 
            array (
                'id' => 20,
                'key' => 'ivno.subheadline',
                'display_name' => 'Subheadline',
                'value' => 'UX . Ui Designer',
                'details' => NULL,
                'type' => 'text',
                'order' => 15,
                'group' => 'ivno',
            ),
            19 => 
            array (
                'id' => 21,
                'key' => 'ivno.description',
                'display_name' => 'Description',
                'value' => '<p>I Help Businesses to Create</p>
<p><span class="text-gradient font-semibold" style="background-image: linear-gradient(315deg, #2d0e68 0%, #5334da 14.27%, #5396ec 56.98%, #54ffff 100%);">Brilliant Experience</span> for their</p>
<p>Users &amp; Bring Much More</p>
<p>Value <span class="text-gradient font-semibold" style="background-image: linear-gradient(315deg, #2d0e68 0%, #5334da 14.27%, #5396ec 56.98%, #54ffff 100%);">to the Life</span></p>',
                'details' => NULL,
                'type' => 'rich_text_box',
                'order' => 16,
                'group' => 'ivno',
            ),
            20 => 
            array (
                'id' => 22,
                'key' => 'ivno.hero_items',
                'display_name' => 'Hero Items',
                'value' => '<p>&lt;-<img style="margin-right: 0.5rem;" src="https://cdn.joypixels.com/emoji/joypixels/6.0/png/unicode/32/1f607.png" width="24" height="24" />Design is about Life-&gt;</p>
<p>&lt;-<img style="margin-right: 0.5rem;" src="https://cdn.joypixels.com/emoji/joypixels/6.0/png/unicode/32/1f62e.png" width="24" height="24" />Small Changes Big Achievments-&gt;</p>
<p>&lt;-<img style="margin-right: 0.5rem;" src="https://cdn.joypixels.com/emoji/joypixels/6.0/png/unicode/32/1f607.png" width="24" height="24" />+2 Years of Exprience-&gt;</p>
<p>&lt;-<img style="margin-right: 0.5rem;" src="https://cdn.joypixels.com/emoji/joypixels/6.5/png/unicode/32/1f60d.png" width="24" height="24" />I Love Feedback-&gt;</p>
<p>&lt;-<img style="margin-right: 0.5rem;" src="https://cdn.joypixels.com/emoji/joypixels/6.0/png/unicode/32/1f609.png" width="24" height="24" />Creativity is Connecting the Dots-&gt;</p>
<p>&lt;-<img style="margin-right: 0.5rem;" src="https://cdn.joypixels.com/emoji/joypixels/6.0/png/unicode/32/1f61c.png" width="24" height="24" />Small Changes Big Achievments-&gt;</p>',
                'details' => '{"prepare":true}',
                'type' => 'rich_text_box',
                'order' => 17,
                'group' => 'ivno',
            ),
            21 => 
            array (
                'id' => 23,
                'key' => 'ivno.hero_items_degree_rotation',
                'display_name' => 'Hero Items Degree Of Rotation',
                'value' => '5',
                'details' => NULL,
                'type' => 'number',
                'order' => 18,
                'group' => 'ivno',
            ),
            22 => 
            array (
                'id' => 24,
                'key' => 'ivno.skills_radar_bg',
                'display_name' => 'Skills Radar Background',
                'value' => 'settings\\April2022\\6doUoqqjx4O4CGBeoKsV.png',
                'details' => '{"resize":{"width":"256","height":null},"quality":"80%","upsize":true}',
                'type' => 'image',
                'order' => 19,
                'group' => 'ivno',
            ),
            23 => 
            array (
                'id' => 25,
                'key' => 'ivno.radar_area_gradient',
                'display_name' => 'Radar Area Gradient',
            'value' => 'linear-gradient(315deg, rgb(84, 74, 219) 0.00%,rgb(245, 88, 166) 100.00%)',
                'details' => NULL,
                'type' => 'gradient',
                'order' => 20,
                'group' => 'ivno',
            ),
            24 => 
            array (
                'id' => 26,
                'key' => 'ivno.radar_area_roundstrokes',
                'display_name' => 'Radar Area Stroke Type',
                'value' => 'false',
                'details' => '{"default":"true","options":{"true":"round","false":"jagged"}}',
                'type' => 'radio_btn',
                'order' => 21,
                'group' => 'ivno',
            ),
            25 => 
            array (
                'id' => 27,
                'key' => 'ivno.other_skills',
                'display_name' => 'Other Skills',
                'value' => '<p>&lt;-<img style="margin-right: 0.5rem;" src="https://drive.google.com/uc?id=1Y7ifTOxZzm1xc1eQw8h4E4X8jj0IGngg&amp;export=media" width="24" height="24" /><span style="white-space: pre-wrap;">Coding &lt;Hmtl, Css, Javascript &amp; Vue&gt;</span>-&gt;</p>
<p>&lt;-<img style="margin-right: 0.5rem;" src="https://drive.google.com/uc?id=1NbLW1KzBCfhauvimhXpl2ZyaFxCfNlM9&amp;export=media" width="24" height="24" /><span style="white-space: pre-wrap;">Marketing &amp; Business Skills</span>-&gt;</p>',
                'details' => '{"prepare":true}',
                'type' => 'rich_text_box',
                'order' => 24,
                'group' => 'ivno',
            ),
            26 => 
            array (
                'id' => 28,
                'key' => 'ivno.contacts',
                'display_name' => 'Contact Me',
                'value' => '<p><a class="contact" href="mailto:amir.ivno@Gmail.com" target="_blank" rel="noopener">AMIR.IVNO<span style="opacity: 50%;">@Gmail.com</span></a></p>',
                'details' => NULL,
                'type' => 'rich_text_box',
                'order' => 25,
                'group' => 'ivno',
            ),
            27 => 
            array (
                'id' => 29,
                'key' => 'ivno.footer_image',
                'display_name' => 'Footer Image',
                'value' => 'settings\\April2022\\aFQSeMUNgqNjgNTqU2ji.png',
                'details' => '{
"resize": {
"width": "1000",
"height": null
},
"quality": "70%",
"upsize": false
}',
                'type' => 'image',
                'order' => 26,
                'group' => 'ivno',
            ),
            28 => 
            array (
                'id' => 30,
                'key' => 'ivno.footer_bg_glow',
                'display_name' => 'Footer Glow',
            'value' => 'linear-gradient(180deg, rgba(45, 14, 104, 0) 3.54%, rgba(84, 244, 253, 0.27) 116.99%)',
                'details' => NULL,
                'type' => 'gradient',
                'order' => 27,
                'group' => 'ivno',
            ),
            29 => 
            array (
                'id' => 31,
                'key' => 'ivno.radar_dot_radius',
                'display_name' => 'Radar Dot Radius',
                'value' => '7',
                'details' => '',
                'type' => 'number',
                'order' => 22,
                'group' => 'ivno',
            ),
            30 => 
            array (
                'id' => 32,
                'key' => 'ivno.radar_stroke_width',
                'display_name' => 'Radar Stroke Width',
                'value' => '4',
                'details' => NULL,
                'type' => 'number',
                'order' => 23,
                'group' => 'ivno',
            ),
            31 => 
            array (
                'id' => 33,
                'key' => 'ivno.google_analytics_tracking_id',
                'display_name' => 'Google Analytics Tracking ID',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 24,
                'group' => 'ivno',
            ),
        ));
        
        
    }
}