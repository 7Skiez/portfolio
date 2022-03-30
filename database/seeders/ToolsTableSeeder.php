<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ToolsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('tools')->delete();

        \DB::table('tools')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Et sunt.',
                'image' => 'tools\\March2022\\40TT0PvzF0WKk4UacumH.png',
                'link' => 'http://www.haag.com/vero-quas-et-laboriosam.html',
                'owner_id' => 2,
                'order' => 1,
                'featured' => 1,
                'created_at' => '2022-03-15 12:37:24',
                'updated_at' => '2022-03-15 12:50:08',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Quo.',
                'image' => 'tools\\March2022\\KZEx1bTBR0Y5xLZb0ZrU.png',
                'link' => 'http://www.ondricka.com/voluptatem-debitis-atque-facilis-tempore-non-neque.html',
                'owner_id' => 2,
                'order' => 2,
                'featured' => 1,
                'created_at' => '2022-03-15 12:37:24',
                'updated_at' => '2022-03-15 12:49:57',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Fuga et.',
                'image' => 'tools\\March2022\\AXyoEhhYAvneswdg6Ic2.png',
                'link' => 'http://www.volkman.com/consectetur-sequi-sint-et.html',
                'owner_id' => 2,
                'order' => 3,
                'featured' => 1,
                'created_at' => '2022-03-15 12:37:24',
                'updated_at ' => '2022-03-15 12:50:17 ',
            ),
        ));
    }
}
