<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CertificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('certifications')->delete();
        
        \DB::table('certifications')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Certified Designer On IDF',
                'image' => 'certifications\\March2022\\Fre6dabYmp1N61LvQ05Q.png',
                'link' => 'http://www.mueller.biz/magnam-voluptatem-sint-aliquam-nihil.html',
                'bg_rotation' => 245,
                'owner_id' => 2,
                'order' => 1,
                'featured' => 1,
                'created_at' => '2022-03-14 14:26:10',
                'updated_at' => '2022-03-14 14:31:24',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Verified Designer On Uxcel',
                'image' => 'certifications\\March2022\\HFNRQnc20IgJxlePNgvO.png',
                'link' => 'http://www.lind.com/aliquam-dicta-nobis-ipsa',
                'bg_rotation' => 14,
                'owner_id' => 2,
                'order' => 2,
                'featured' => 1,
                'created_at' => '2022-03-14 14:26:10',
                'updated_at' => '2022-03-14 14:30:58',
            ),
        ));
        
        
    }
}