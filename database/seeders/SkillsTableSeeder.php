<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('skills')->delete();

        \DB::table('skills')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'PHP',
                'percentage' => '0.80',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 1,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2021-12-28 17:53:24',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Laravel',
                'percentage' => '0.60',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 2,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2021-12-28 18:24:16',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Java Script',
                'percentage' => '0.55',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 3,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2021-12-28 18:09:13',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Vue.Js',
                'percentage' => '0.40',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 4,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2021-12-28 17:55:19',
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Tailwind',
                'percentage' => '0.90',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 5,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2021-12-28 18:23:25',
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'HTML',
                'percentage' => '0.90',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 6,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2021-12-28 18:26:43',
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'CSS',
                'percentage' => '0.90',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 7,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2021-12-28 18:22:47',
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'Research',
                'percentage' => '0.95',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 8,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2021-12-28 18:20:36',
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'Aut hic.',
                'percentage' => '0.03',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 9,
                'featured' => 0,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2021-12-28 18:08:39',
            ),
            9 =>
            array(
                'id' => 10,
                'name' => 'Quo.',
                'percentage' => '0.20',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 10,
                'featured' => 0,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2021-12-28 18:08:46',
            ),
            10 =>
            array(
                'id' => 11,
                'name' => 'Interaction Design',
                'percentage' => '0.90',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 2,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-03-25 17:25:22',
            ),
            11 =>
            array(
                'id' => 12,
                'name' => 'User Experience',
                'percentage' => '0.80',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 3,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-03-23 13:37:03',
            ),
            12 =>
            array(
                'id' => 13,
                'name' => 'User Research',
                'percentage' => '0.65',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 1,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-03-25 17:25:22',
            ),
            13 =>
            array(
                'id' => 14,
                'name' => 'Technical',
                'percentage' => '0.95',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 4,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-03-18 22:40:22',
            ),
            14 =>
            array(
                'id' => 15,
                'name' => 'Process',
                'percentage' => '0.95',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 5,
                'featured' => 0,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-03-26 00:51:34',
            ),
            15 =>
            array(
                'id' => 16,
                'name' => 'Visual Design',
                'percentage' => '0.90',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 6,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-03-18 22:40:57',
            ),
            16 =>
            array(
                'id' => 17,
                'name' => 'Typing',
                'percentage' => '0.50',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 11,
                'featured' => 1,
                'created_at' => '2022-03-26 18:14:34',
                'updated_at' => '2022-03-26 18:14:34',
            ),
        ));
    }
}
