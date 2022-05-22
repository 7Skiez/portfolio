<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'mjr',
                'email' => '7skies@admin.com',
                'avatar' => 'users/April2022/527fa4cac0f7cd2a9b002c5e3fbd558c.avif',
                'username' => 'jd',
                'email_verified_at' => '2022-04-02 04:38:52',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'BazUBQhojWkVgOiRhoEZ34IyLe1vVyIpPT4i2KFWXPlTF7oXAzrvhALYthIo',
                'settings' => NULL,
                'created_at' => '2022-04-02 04:38:54',
                'updated_at' => '2022-04-02 04:38:54',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 2,
                'name' => 'Ivno',
                'email' => 'ivno@admin.com',
                'avatar' => 'users/April2022/fgLNNFfW5UEQFAc03jtM.avif',
                'username' => 'ivno',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ykKYwz1sD4m5SwSsiXDDWeZ8kefcjIi2n1rh8xmXaVyQTFlnWHapu',
                'remember_token' => 'x7Zpqvt12T55EEFia1sgYSmj7pxrBwKH6ewbzSQbYOyYlnz1yENiEh5qrV1o',
                'settings' => '{"locale":"en"}',
                'created_at' => '2022-03-29 22:10:34',
                'updated_at' => '2022-04-13 01:55:00',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 1,
                'name' => 'Aron',
                'email' => 'rrunolfsdottir@example.org',
                'avatar' => 'users/May2022/9fbabe144c40481e2437876d7d882236.jpg',
                'username' => 'aron',
                'email_verified_at' => '2022-05-19 14:28:18',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'HehTyZffV0zOfJnDKDcoFB0ObtXX0sqpAmP47dr0nQ96331XeG7ithox4ebw',
                'settings' => NULL,
                'created_at' => '2022-05-19 14:28:20',
                'updated_at' => '2022-05-19 14:28:20',
            ),
        ));
        
        
    }
}