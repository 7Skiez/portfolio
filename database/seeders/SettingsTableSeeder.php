<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsTableSeeder extends Seeder
{
  /**
   * Auto generated seed file.
   */
  public function run()
  {

    \DB::table('settings')->delete();

    \DB::table('settings')->insert(array(
      0 =>
      array(
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
      array(
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
      array(
        'id' => 3,
        'key' => 'site.logo',
        'display_name' => 'Site Logo',
        'value' => '',
        'details' => '',
        'type' => 'image',
        'order' => 3,
        'group' => 'Site',
      ),
      3 =>
      array(
        'id' => 4,
        'key' => 'site.google_analytics_tracking_id',
        'display_name' => 'Google Analytics Tracking ID',
        'value' => NULL,
        'details' => '',
        'type' => 'text',
        'order' => 4,
        'group' => 'Site',
      ),
      4 =>
      array(
        'id' => 5,
        'key' => 'admin.bg_image',
        'display_name' => 'Admin Background Image',
        'value' => '',
        'details' => '',
        'type' => 'image',
        'order' => 5,
        'group' => 'Admin',
      ),
      5 =>
      array(
        'id' => 6,
        'key' => 'admin.title',
        'display_name' => 'Admin Title',
        'value' => 'Voyager',
        'details' => '',
        'type' => 'text',
        'order' => 1,
        'group' => 'Admin',
      ),
      6 =>
      array(
        'id' => 7,
        'key' => 'admin.description',
        'display_name' => 'Admin Description',
        'value' => 'Welcome to Voyager. The Missing Admin for Laravel',
        'details' => '',
        'type' => 'text',
        'order' => 2,
        'group' => 'Admin',
      ),
      7 =>
      array(
        'id' => 8,
        'key' => 'admin.loader',
        'display_name' => 'Admin Loader',
        'value' => '',
        'details' => '',
        'type' => 'image',
        'order' => 3,
        'group' => 'Admin',
      ),
      8 =>
      array(
        'id' => 9,
        'key' => 'admin.icon_image',
        'display_name' => 'Admin Icon Image',
        'value' => '',
        'details' => '',
        'type' => 'image',
        'order' => 4,
        'group' => 'Admin',
      ),
      9 =>
      array(
        'id' => 10,
        'key' => 'admin.google_analytics_client_id',
        'display_name' => 'Google Analytics Client ID (used for admin dashboard)',
        'value' => NULL,
        'details' => '',
        'type' => 'text',
        'order' => 1,
        'group' => 'Admin',
      ),
      10 =>
      array(
        'id' => 11,
        'key' => 'ivno.domain',
        'display_name' => 'Domain',
        'value' => NULL,
        'details' => NULL,
        'type' => 'text',
        'order' => 6,
        'group' => 'ivno',
      ),
      11 =>
      array(
        'id' => 12,
        'key' => 'ivno.bg_color',
        'display_name' => 'Background Color',
        'value' => '#000000',
        'details' => NULL,
        'type' => 'color',
        'order' => 7,
        'group' => 'ivno',
      ),
      12 =>
      array(
        'id' => 13,
        'key' => 'ivno.profile_bg_image',
        'display_name' => 'Profile Background Image',
        'value' => '',
        'details' => NULL,
        'type' => 'image',
        'order' => 8,
        'group' => 'ivno',
      ),
      13 =>
      array(
        'id' => 14,
        'key' => 'ivno.main_gradient',
        'display_name' => 'Main Gradient',
        'value' => '{"colors":[["#451179","0.69"],["#eeff00","1"]],"angle":"100","hint":"50"}',
        'details' => NULL,
        'type' => 'gradient',
        'order' => 9,
        'group' => 'ivno',
      ),
      14 =>
      array(
        'id' => 15,
        'key' => 'ivno.accent_bg_color',
        'display_name' => 'Accent Background Color',
        'value' => '#000000',
        'details' => NULL,
        'type' => 'color',
        'order' => 10,
        'group' => 'ivno',
      ),
      15 =>
      array(
        'id' => 16,
        'key' => 'ivno.accent_text_color',
        'display_name' => 'Accent Text Color',
        'value' => '#000000',
        'details' => NULL,
        'type' => 'color',
        'order' => 11,
        'group' => 'ivno',
      ),
      16 =>
      array(
        'id' => 17,
        'key' => 'ivno.logo',
        'display_name' => 'Logo',
        'value' => '',
        'details' => NULL,
        'type' => 'image',
        'order' => 12,
        'group' => 'ivno',
      ),
      17 =>
      array(
        'id' => 18,
        'key' => 'ivno.logo_rotation',
        'display_name' => 'Logo Rotation',
        'value' => '0',
        'details' => NULL,
        'type' => 'checkbox',
        'order' => 13,
        'group' => 'ivno',
      ),
      18 =>
      array(
        'id' => 19,
        'key' => 'ivno.headline',
        'display_name' => 'Headline',
        'value' => NULL,
        'details' => NULL,
        'type' => 'rich_text_box',
        'order' => 14,
        'group' => 'ivno',
      ),
      19 =>
      array(
        'id' => 20,
        'key' => 'ivno.subheadline',
        'display_name' => 'Subheadline',
        'value' => NULL,
        'details' => NULL,
        'type' => 'text',
        'order' => 15,
        'group' => 'ivno',
      ),
      20 =>
      array(
        'id' => 21,
        'key' => 'ivno.description',
        'display_name' => 'Description',
        'value' => NULL,
        'details' => NULL,
        'type' => 'rich_text_box',
        'order' => 16,
        'group' => 'ivno',
      ),
      21 =>
      array(
        'id' => 22,
        'key' => '.Hero Items',
        'display_name' => 'hero_items',
        'value' => NULL,
        'details' => NULL,
        'type' => 'rich_text_box',
        'order' => 17,
        'group' => NULL,
      ),
      22 =>
      array(
        'id' => 23,
        'key' => 'ivno.hero_items_degree_rotation',
        'display_name' => 'Hero Items Degree Of Rotation',
        'value' => NULL,
        'details' => NULL,
        'type' => 'number',
        'order' => 18,
        'group' => 'ivno',
      ),
      23 =>
      array(
        'id' => 24,
        'key' => 'ivno.skills_radar_bg',
        'display_name' => 'Skills Radar Background',
        'value' => '',
        'details' => NULL,
        'type' => 'image',
        'order' => 19,
        'group' => 'ivno',
      ),
      24 =>
      array(
        'id' => 25,
        'key' => 'ivno.radar_area_gradient',
        'display_name' => 'Radar Area Gradient',
        'value' => '{"colors":[["#80ff00","1"],["#02a22a","1"]]}',
        'details' => NULL,
        'type' => 'gradient',
        'order' => 20,
        'group' => 'ivno',
      ),
      25 =>
      array(
        'id' => 26,
        'key' => 'ivno.radar_area_roundstrokes',
        'display_name' => 'Radar Area Round Strokes',
        'value' => 'true',
        'details' => '{"default":"true","options":{"true":"round","false":"jagged"}}',
        'type' => 'radio_btn',
        'order' => 21,
        'group' => 'ivno',
      ),
      26 =>
      array(
        'id' => 27,
        'key' => 'ivno.other_skills',
        'display_name' => 'Other Skills',
        'value' => NULL,
        'details' => NULL,
        'type' => 'rich_text_box',
        'order' => 22,
        'group' => 'ivno',
      ),
      27 =>
      array(
        'id' => 28,
        'key' => 'ivno.contact_me',
        'display_name' => 'Contact Me',
        'value' => NULL,
        'details' => NULL,
        'type' => 'rich_text_box',
        'order' => 23,
        'group' => 'ivno',
      ),
      28 =>
      array(
        'id' => 29,
        'key' => 'ivno.footer_image',
        'display_name' => 'Footer Image',
        'value' => '',
        'details' => NULL,
        'type' => 'image',
        'order' => 24,
        'group' => 'ivno',
      ),
      29 =>
      array(
        'id' => 30,
        'key' => 'ivno.footer_bg_glow',
        'display_name' => 'Footer Glow',
        'value' => '{"colors":[["#299494","0.35"],["#0000ff","0.81"]]}',
        'details' => NULL,
        'type' => 'gradient',
        'order' => 25,
        'group' => 'ivno',
      ),
    ));
  }

  /**
   * [setting description].
   *
   * @param [type] $key [description]
   *
   * @return [type] [description]
   */
  protected function findSetting($key)
  {
    return Setting::firstOrNew(['key' => $key]);
  }
}
