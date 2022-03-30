<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menus')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2017-11-21 16:23:22',
                'updated_at' => '2017-11-21 16:23:22',
            ),
            1 =>
            array(
                'id' => 3,
                'name' => 'ivno',
                'created_at' => '2022-03-14 06:43:10',
                'updated_at' => '2022-03-21 16:38:30',
            ),
        ));
    }
}
