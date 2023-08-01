<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VolunteersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('volunteers')->delete();
        
        \DB::table('volunteers')->insert(array (
            0 => 
            array (
                'address' => 'Tanay',
                'birthdate' => '2001-12-12',
                'created_at' => '2023-07-28 18:04:56',
                'firstname' => 'Volunteer',
                'id' => 1,
                'lastname' => 'Test',
                'middlename' => NULL,
                'ministry' => 'Liturgical Music Ministry, Social Communications Ministry, Ministry of Altar Servers, Ministry of Lay Minister, Ministry of Mother Butler Guild',
                'mobilenumber' => '11111111111',
                'status' => 'active',
                'updated_at' => '2023-07-29 07:40:09',
            ),
        ));
        
        
    }
}