<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PriestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('priests')->delete();
        
        \DB::table('priests')->insert(array (
            0 => 
            array (
                'address' => 'Tanay',
                'birthdate' => '2000-12-12',
                'conventual' => 'Test',
                'created_at' => '2023-07-27 08:52:31',
                'email' => 'samplepriest@gmail.com',
                'firstname' => 'Sample',
                'id' => 1,
                'lastname' => 'Priest',
                'middlename' => NULL,
                'mobilenumber' => '12313124141',
                'position' => 'Main Priest',
                'status' => 'active',
                'updated_at' => '2023-07-28 06:41:33',
            ),
        ));
        
        
    }
}