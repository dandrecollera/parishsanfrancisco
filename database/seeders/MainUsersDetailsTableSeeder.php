<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MainUsersDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('main_users_details')->delete();

        \DB::table('main_users_details')->insert(array (
            0 =>
            array (
                'id' => 1,
                'userid' => 1,
                'username' => 'Admin',
                'firstname' => 'Main Admin',
                'middlename' => '',
                'lastname' => 'PSFA',
                'birthdate' => '1999-12-12',
                'gender' => 'Male',
                'province' => '1',
                'municipality' => '45',
                'mobilenumber' => '99999999999',
                'created_at' => '2023-07-15 20:57:56',
                'updated_at' => '2023-07-15 20:57:56',
            ),
        ));


    }
}
