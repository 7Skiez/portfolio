<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('media')->delete();

        \DB::table('media')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Nobis.',
                'image' => 'social_media\\March2022\\PfwdZdEaOkHeXkyALio9.png',
                'link' => 'http://www.reilly.com/quae-quo-mollitia-sunt-doloribus-hic-tenetur',
                'owner_id' => 2,
                'order' => 1,
                'featured' => 1,
                'created_at' => '2022-03-15 09:34:00',
                'updated_at' => '2022-03-15 09:52:00',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Rerum.',
                'image' => 'social_media\\March2022\\SVYVtRgnITVXrORrbxQh.png',
                'link' => 'http://www.gulgowski.biz/consequatur-blanditiis-tenetur-dolor-provident-aliquam',
                'owner_id' => 2,
                'order' => 2,
                'featured' => 1,
                'created_at' => '2022-03-15 09:34:00',
                'updated_at' => '2022-03-15 09:57:37',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Quo.',
                'image' => 'social_media\\March2022\\8V8dZjgMswLrrVrde0Ma.png',
                'link' => 'http://www.brakus.biz/doloribus-pariatur-ipsa-tenetur-temporibus-explicabo-esse-et',
                'owner_id' => 2,
                'order' => 3,
                'featured' => 1,
                'created_at' => '2022-03-15 09:34:00',
                'updated_at' => '2022-03-15 09:57:46',
            ),
        ));
    }
}
