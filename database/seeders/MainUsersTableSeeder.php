<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MainUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('main_users')->delete();

        \DB::table('main_users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'email' => 'masteradmin@parishsanfrancisco.com',
                'password' => '482c811da5d5b4bc6d497ffa98491e38',
                'accounttype' => 'admin',
                'status' => 'active',
                'otp' => 'ZVEWIY',
                'otp_added_at' => '20:57:56',
                'otp_token' => 'zTbWJSCwwfcy',
                'verified' => 1,
                'created_at' => '2023-07-15 20:57:56',
                'updated_at' => '2023-07-15 20:57:56',
            ),
        ));


    }
}
