<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'App\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'App\\Http\\Controllers\\Voyager\\VoyagerUserController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":null}',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-04-13 01:54:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'App\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":"currentUser"}',
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-04-17 22:09:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'categories',
                'slug' => 'categories',
                'display_name_singular' => 'Category',
                'display_name_plural' => 'Categories',
                'icon' => 'voyager-categories',
                'model_name' => 'TCG\\Voyager\\Models\\Category',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-03-29 22:10:33',
                'updated_at' => '2022-03-29 22:10:33',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'posts',
                'slug' => 'posts',
                'display_name_singular' => 'Post',
                'display_name_plural' => 'Posts',
                'icon' => 'voyager-news',
                'model_name' => 'TCG\\Voyager\\Models\\Post',
                'policy_name' => 'TCG\\Voyager\\Policies\\PostPolicy',
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-03-29 22:10:34',
                'updated_at' => '2022-03-29 22:10:34',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'pages',
                'slug' => 'pages',
                'display_name_singular' => 'Page',
                'display_name_plural' => 'Pages',
                'icon' => 'voyager-file-text',
                'model_name' => 'TCG\\Voyager\\Models\\Page',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-03-29 22:10:34',
                'updated_at' => '2022-03-29 22:10:34',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'projects',
                'slug' => 'projects',
                'display_name_singular' => 'Project',
                'display_name_plural' => 'Projects',
                'icon' => 'voyager-laptop',
                'model_name' => 'App\\Models\\Project',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":"order","order_display_column":"title","order_direction":"asc","default_search_key":null,"scope":"currentUser"}',
                'created_at' => '2022-04-01 09:59:25',
                'updated_at' => '2022-04-02 03:24:51',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'skills',
                'slug' => 'skills',
                'display_name_singular' => 'Skill',
                'display_name_plural' => 'Skills',
                'icon' => 'voyager-pie-chart',
                'model_name' => 'App\\Models\\Skill',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":"order","order_display_column":"name","order_direction":"desc","default_search_key":null,"scope":"currentUser"}',
                'created_at' => '2022-04-02 03:08:14',
                'updated_at' => '2022-04-02 16:57:22',
            ),
            8 => 
            array (
                'id' => 11,
                'name' => 'certifications',
                'slug' => 'certifications',
                'display_name_singular' => 'Certification',
                'display_name_plural' => 'Certifications',
                'icon' => 'voyager-certificate',
                'model_name' => 'App\\Models\\Certification',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":"order","order_display_column":"title","order_direction":"asc","default_search_key":null}',
                'created_at' => '2022-04-02 03:16:43',
                'updated_at' => '2022-04-02 03:16:43',
            ),
            9 => 
            array (
                'id' => 12,
                'name' => 'tools',
                'slug' => 'tools',
                'display_name_singular' => 'Tool',
                'display_name_plural' => 'Tools',
                'icon' => 'voyager-tools',
                'model_name' => 'App\\Models\\Tool',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":"order","order_display_column":"name","order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-04-02 03:20:04',
                'updated_at' => '2022-04-02 03:24:09',
            ),
            10 => 
            array (
                'id' => 14,
                'name' => 'media',
                'slug' => 'social-media',
                'display_name_singular' => 'Social-Medium',
                'display_name_plural' => 'Social-Media',
                'icon' => 'voyager-facebook',
                'model_name' => 'App\\Models\\Medium',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":"order","order_display_column":"name","order_direction":"asc","default_search_key":null}',
                'created_at' => '2022-04-02 03:38:51',
                'updated_at' => '2022-04-02 03:38:51',
            ),
        ));
        
        
    }
}