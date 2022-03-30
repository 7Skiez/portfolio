<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'avatar' => 'users/default.png',
                'username' => 'admin',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ykKYwz1sD4m5SwSsiXDDWeZ8kefcjIi2n1rh8xmXaVyQTFlnWHapu',
                'remember_token' => 'vmHBCghk8amQoI2W7sv8FFa6wfWOCMRXZThROChWDPoAq073mFlctRaoctIL',
                'settings' => NULL,
                'created_at' => '2022-03-29 22:10:34',
                'updated_at' => '2022-03-29 22:10:34',
            )
        ));
    }
}
