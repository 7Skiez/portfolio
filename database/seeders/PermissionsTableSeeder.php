<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            25 => 
            array (
                'id' => 41,
                'key' => 'browse_projects',
                'table_name' => 'projects',
                'created_at' => '2022-04-01 09:59:25',
                'updated_at' => '2022-04-01 09:59:25',
            ),
            26 => 
            array (
                'id' => 42,
                'key' => 'read_projects',
                'table_name' => 'projects',
                'created_at' => '2022-04-01 09:59:25',
                'updated_at' => '2022-04-01 09:59:25',
            ),
            27 => 
            array (
                'id' => 43,
                'key' => 'edit_projects',
                'table_name' => 'projects',
                'created_at' => '2022-04-01 09:59:25',
                'updated_at' => '2022-04-01 09:59:25',
            ),
            28 => 
            array (
                'id' => 44,
                'key' => 'add_projects',
                'table_name' => 'projects',
                'created_at' => '2022-04-01 09:59:25',
                'updated_at' => '2022-04-01 09:59:25',
            ),
            29 => 
            array (
                'id' => 45,
                'key' => 'delete_projects',
                'table_name' => 'projects',
                'created_at' => '2022-04-01 09:59:25',
                'updated_at' => '2022-04-01 09:59:25',
            ),
            30 => 
            array (
                'id' => 46,
                'key' => 'browse_skills',
                'table_name' => 'skills',
                'created_at' => '2022-04-02 03:08:14',
                'updated_at' => '2022-04-02 03:08:14',
            ),
            31 => 
            array (
                'id' => 47,
                'key' => 'read_skills',
                'table_name' => 'skills',
                'created_at' => '2022-04-02 03:08:14',
                'updated_at' => '2022-04-02 03:08:14',
            ),
            32 => 
            array (
                'id' => 48,
                'key' => 'edit_skills',
                'table_name' => 'skills',
                'created_at' => '2022-04-02 03:08:14',
                'updated_at' => '2022-04-02 03:08:14',
            ),
            33 => 
            array (
                'id' => 49,
                'key' => 'add_skills',
                'table_name' => 'skills',
                'created_at' => '2022-04-02 03:08:14',
                'updated_at' => '2022-04-02 03:08:14',
            ),
            34 => 
            array (
                'id' => 50,
                'key' => 'delete_skills',
                'table_name' => 'skills',
                'created_at' => '2022-04-02 03:08:14',
                'updated_at' => '2022-04-02 03:08:14',
            ),
            35 => 
            array (
                'id' => 51,
                'key' => 'browse_certifications',
                'table_name' => 'certifications',
                'created_at' => '2022-04-02 03:16:43',
                'updated_at' => '2022-04-02 03:16:43',
            ),
            36 => 
            array (
                'id' => 52,
                'key' => 'read_certifications',
                'table_name' => 'certifications',
                'created_at' => '2022-04-02 03:16:43',
                'updated_at' => '2022-04-02 03:16:43',
            ),
            37 => 
            array (
                'id' => 53,
                'key' => 'edit_certifications',
                'table_name' => 'certifications',
                'created_at' => '2022-04-02 03:16:43',
                'updated_at' => '2022-04-02 03:16:43',
            ),
            38 => 
            array (
                'id' => 54,
                'key' => 'add_certifications',
                'table_name' => 'certifications',
                'created_at' => '2022-04-02 03:16:43',
                'updated_at' => '2022-04-02 03:16:43',
            ),
            39 => 
            array (
                'id' => 55,
                'key' => 'delete_certifications',
                'table_name' => 'certifications',
                'created_at' => '2022-04-02 03:16:43',
                'updated_at' => '2022-04-02 03:16:43',
            ),
            40 => 
            array (
                'id' => 56,
                'key' => 'browse_tools',
                'table_name' => 'tools',
                'created_at' => '2022-04-02 03:20:04',
                'updated_at' => '2022-04-02 03:20:04',
            ),
            41 => 
            array (
                'id' => 57,
                'key' => 'read_tools',
                'table_name' => 'tools',
                'created_at' => '2022-04-02 03:20:04',
                'updated_at' => '2022-04-02 03:20:04',
            ),
            42 => 
            array (
                'id' => 58,
                'key' => 'edit_tools',
                'table_name' => 'tools',
                'created_at' => '2022-04-02 03:20:04',
                'updated_at' => '2022-04-02 03:20:04',
            ),
            43 => 
            array (
                'id' => 59,
                'key' => 'add_tools',
                'table_name' => 'tools',
                'created_at' => '2022-04-02 03:20:04',
                'updated_at' => '2022-04-02 03:20:04',
            ),
            44 => 
            array (
                'id' => 60,
                'key' => 'delete_tools',
                'table_name' => 'tools',
                'created_at' => '2022-04-02 03:20:04',
                'updated_at' => '2022-04-02 03:20:04',
            ),
            45 => 
            array (
                'id' => 66,
                'key' => 'browse_media',
                'table_name' => 'media',
                'created_at' => '2022-04-02 03:38:51',
                'updated_at' => '2022-04-02 03:38:51',
            ),
            46 => 
            array (
                'id' => 67,
                'key' => 'read_media',
                'table_name' => 'media',
                'created_at' => '2022-04-02 03:38:51',
                'updated_at' => '2022-04-02 03:38:51',
            ),
            47 => 
            array (
                'id' => 68,
                'key' => 'edit_media',
                'table_name' => 'media',
                'created_at' => '2022-04-02 03:38:51',
                'updated_at' => '2022-04-02 03:38:51',
            ),
            48 => 
            array (
                'id' => 69,
                'key' => 'add_media',
                'table_name' => 'media',
                'created_at' => '2022-04-02 03:38:51',
                'updated_at' => '2022-04-02 03:38:51',
            ),
            49 => 
            array (
                'id' => 70,
                'key' => 'delete_media',
                'table_name' => 'media',
                'created_at' => '2022-04-02 03:38:51',
                'updated_at' => '2022-04-02 03:38:51',
            ),
        ));
        
        
    }
}