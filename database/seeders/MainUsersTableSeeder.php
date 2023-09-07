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
                'accounttype' => 'admin',
                'created_at' => '2023-07-15 20:57:56',
                'email' => 'masteradmin@parishsanfrancisco.com',
                'id' => 1,
                'otp' => 'ZVEWIY',
                'otp_added_at' => '20:57:56',
                'otp_token' => 'zTbWJSCwwfcy',
                'password' => '482c811da5d5b4bc6d497ffa98491e38',
                'status' => 'active',
                'updated_at' => '2023-07-15 20:57:56',
                'verified' => 1,
            ),
            1 =>
            array (
                'accounttype' => 'user',
                'created_at' => '2023-07-26 06:39:18',
                'email' => 'user@gmail.com',
                'id' => 2,
                'otp' => NULL,
                'otp_added_at' => NULL,
                'otp_token' => NULL,
                'password' => '482c811da5d5b4bc6d497ffa98491e38',
                'status' => 'active',
                'updated_at' => '2023-07-27 07:51:25',
                'verified' => 1,
            ),
            2 =>
            array (
                'accounttype' => 'secretary',
                'created_at' => '2023-07-26 06:41:42',
                'email' => 'secretary1@parishsanfrancisco.com',
                'id' => 3,
                'otp' => NULL,
                'otp_added_at' => NULL,
                'otp_token' => NULL,
                'password' => '482c811da5d5b4bc6d497ffa98491e38',
                'status' => 'active',
                'updated_at' => '2023-07-27 00:53:57',
                'verified' => 1,
            ),
            3 =>
            array (
                'accounttype' => 'user',
                'created_at' => '2023-07-26 07:44:21',
                'email' => 'user1@gmail.com',
                'id' => 4,
                'otp' => NULL,
                'otp_added_at' => NULL,
                'otp_token' => NULL,
                'password' => '482c811da5d5b4bc6d497ffa98491e38',
                'status' => 'active',
                'updated_at' => '2023-07-27 07:50:31',
                'verified' => 1,
            ),
            4 =>
            array (
                'accounttype' => 'admin',
                'created_at' => '2023-07-26 08:09:44',
                'email' => 'anotheradmin@parishsanfrancisco.com',
                'id' => 5,
                'otp' => NULL,
                'otp_added_at' => NULL,
                'otp_token' => NULL,
                'password' => '482c811da5d5b4bc6d497ffa98491e38',
                'status' => 'active',
                'updated_at' => '2023-07-27 07:50:33',
                'verified' => 1,
            ),
            5 =>
            array (
                'accounttype' => 'admin',
                'created_at' => '2023-07-26 08:12:49',
                'email' => 'anotheradmin2@parishsanfrancisco.com',
                'id' => 6,
                'otp' => NULL,
                'otp_added_at' => NULL,
                'otp_token' => NULL,
                'password' => '482c811da5d5b4bc6d497ffa98491e38',
                'status' => 'active',
                'updated_at' => '2023-07-26 08:12:49',
                'verified' => 1,
            ),
            6 =>
            array (
                'accounttype' => 'media',
                'created_at' => '2023-07-27 00:22:49',
                'email' => 'media@parishsanfrancisco.com',
                'id' => 7,
                'otp' => NULL,
                'otp_added_at' => NULL,
                'otp_token' => NULL,
                'password' => '482c811da5d5b4bc6d497ffa98491e38',
                'status' => 'active',
                'updated_at' => '2023-07-27 00:22:49',
                'verified' => 1,
            ),
        ));


    }
}
