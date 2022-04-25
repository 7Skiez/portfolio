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
                'order' => 1,
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
                'order' => 2,
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
                'order' => 3,
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
                'order' => 4,
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
                'order' => 5,
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
                'order' => 6,
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
                'order' => 7,
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
                'order' => 8,
                'featured' => 1,
                'created_at' => '2021-12-19 12:08:28',
                'updated_at' => '2022-04-02 16:59:23',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Interaction Design',
                'percentage' => '90',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 9,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-04-21 03:41:22',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'User Experience',
                'percentage' => '80',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 10,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-04-21 03:41:22',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'User Research',
                'percentage' => '65',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 11,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-04-21 03:41:22',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Technical',
                'percentage' => '95',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 12,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-04-21 03:41:22',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Visual Design',
                'percentage' => '90',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 13,
                'featured' => 1,
                'created_at' => '2022-03-14 14:14:57',
                'updated_at' => '2022-04-21 03:41:22',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Process',
                'percentage' => '95',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 14,
                'featured' => 1,
                'created_at' => '2022-04-02 16:55:52',
                'updated_at' => '2022-04-21 03:41:22',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Typing',
                'percentage' => '50',
                'image' => NULL,
                'owner_id' => 1,
                'order' => 15,
                'featured' => 1,
                'created_at' => '2022-04-05 18:17:40',
                'updated_at' => '2022-04-05 18:17:40',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Gaming',
                'percentage' => '36',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 16,
                'featured' => 0,
                'created_at' => '2022-04-06 08:21:29',
                'updated_at' => '2022-04-21 03:41:27',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Surfing',
                'percentage' => '20',
                'image' => NULL,
                'owner_id' => 2,
                'order' => 17,
                'featured' => 0,
                'created_at' => '2022-04-17 04:57:26',
                'updated_at' => '2022-04-21 03:41:31',
            ),
        ));
        
        
    }
}