<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('skills')->delete();
        
        \DB::table('skills')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'PHP',
                'percentage' => '1',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 37,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2022-04-02 16:59:23',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Laravel',
                'percentage' => '1',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 36,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2022-04-02 16:59:23',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Java Script',
                'percentage' => '1',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 35,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2022-04-02 16:59:23',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Vue.Js',
                'percentage' => '0',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 34,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2022-04-02 16:59:23',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Tailwind',
                'percentage' => '1',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 33,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2022-04-02 16:59:23',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'HTML',
                'percentage' => '1',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 32,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2022-04-02 16:59:23',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'CSS',
                'percentage' => '1',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 31,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2022-04-02 16:59:23',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Research',
                'percentage' => '1',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 28,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2022-04-02 16:59:23',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Aut hic.',
                'percentage' => '0',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 30,
                'featured' => 0,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2022-04-02 16:59:23',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Quo.',
                'percentage' => '0',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 29,
                'featured' => 0,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2022-04-02 16:59:23',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Interaction Design',
                'percentage' => '90',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 146,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-04-06 20:13:57',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'User Experience',
                'percentage' => '80',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 143,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-04-06 20:13:36',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'User Research',
                'percentage' => '65',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 142,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-04-06 20:13:36',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Technical',
                'percentage' => '95',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 144,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-04-06 20:13:57',
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'Visual Design',
                'percentage' => '90',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 441,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-04-06 20:13:36',
            ),
            15 => 
            array (
                'id' => 22,
                'name' => 'Process',
                'percentage' => '95',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 145,
                'featured' => 1,
                'created_at' => '2022-04-02 16:55:52',
                'updated_at' => '2022-04-06 20:13:57',
            ),
            16 => 
            array (
                'id' => 23,
                'name' => 'Typing',
                'percentage' => '50',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 38,
                'featured' => 1,
                'created_at' => '2022-04-05 18:17:40',
                'updated_at' => '2022-04-05 18:17:40',
            ),
            17 => 
            array (
                'id' => 24,
                'name' => 'Gaming',
                'percentage' => '36',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 147,
                'featured' => 0,
                'created_at' => '2022-04-06 08:21:29',
                'updated_at' => '2022-04-06 20:14:28',
            ),
        ));
        
        
    }
}