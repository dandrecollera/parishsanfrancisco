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
                'birthdate' => '1999-12-12',
                'created_at' => '2023-07-15 20:57:56',
                'firstname' => 'Main Admin',
                'gender' => 'Male',
                'id' => 1,
                'lastname' => 'PSFA',
                'middlename' => '',
                'mobilenumber' => '99999999999',
                'municipality' => 45,
                'province' => 1,
                'updated_at' => '2023-07-15 20:57:56',
                'userid' => 1,
                'username' => 'Admin',
            ),
            1 => 
            array (
                'birthdate' => '2000-12-12',
                'created_at' => '2023-07-26 06:39:18',
                'firstname' => 'Regular',
                'gender' => 'Male',
                'id' => 2,
                'lastname' => 'User',
                'middlename' => 'Test',
                'mobilenumber' => '11111111111',
                'municipality' => 45,
                'province' => 1,
                'updated_at' => '2023-07-27 07:51:25',
                'userid' => 2,
                'username' => 'azurine',
            ),
            2 => 
            array (
                'birthdate' => '2000-12-12',
                'created_at' => '2023-07-26 06:41:42',
                'firstname' => 'Secretary',
                'gender' => 'Male',
                'id' => 3,
                'lastname' => 'Account',
                'middlename' => '',
                'mobilenumber' => '31512514512',
                'municipality' => 342,
                'province' => 19,
                'updated_at' => '2023-07-26 06:41:42',
                'userid' => 3,
                'username' => 'Secretary',
            ),
            3 => 
            array (
                'birthdate' => '2001-12-11',
                'created_at' => '2023-07-26 07:44:21',
                'firstname' => 'Azurine',
                'gender' => 'Male',
                'id' => 4,
                'lastname' => 'Shiko',
                'middlename' => '',
                'mobilenumber' => '12312412342',
                'municipality' => 11,
                'province' => 1,
                'updated_at' => '2023-07-26 07:44:21',
                'userid' => 4,
                'username' => 'shiko',
            ),
            4 => 
            array (
                'birthdate' => '2000-02-02',
                'created_at' => '2023-07-26 08:09:44',
                'firstname' => 'Admin',
                'gender' => 'Male',
                'id' => 5,
                'lastname' => 'Main 2',
                'middlename' => '',
                'mobilenumber' => '13123131313',
                'municipality' => 48,
                'province' => 3,
                'updated_at' => '2023-07-26 08:09:44',
                'userid' => 5,
                'username' => 'Admin2',
            ),
            5 => 
            array (
                'birthdate' => '2000-03-03',
                'created_at' => '2023-07-26 08:12:49',
                'firstname' => 'Admin',
                'gender' => 'Male',
                'id' => 6,
                'lastname' => 'Main 3',
                'middlename' => '',
                'mobilenumber' => '13123142141',
                'municipality' => 110,
                'province' => 6,
                'updated_at' => '2023-07-26 08:12:49',
                'userid' => 6,
                'username' => 'Admin3',
            ),
            6 => 
            array (
                'birthdate' => '2000-12-12',
                'created_at' => '2023-07-27 00:22:49',
                'firstname' => 'Media',
                'gender' => 'Male',
                'id' => 7,
                'lastname' => 'Main',
                'middlename' => '',
                'mobilenumber' => '13123123123',
                'municipality' => 47,
                'province' => 1,
                'updated_at' => '2023-07-27 00:22:49',
                'userid' => 7,
                'username' => 'Media',
            ),
        ));
        
        
    }
}