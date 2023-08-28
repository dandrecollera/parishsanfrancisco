<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicePricesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_prices')->delete();
        
        \DB::table('service_prices')->insert(array (
            0 => 
            array (
                'id' => 1,
                'service' => 'Baptism',
                'event_type' => 'Regular',
                'amount' => '1.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'service' => 'Baptism',
                'event_type' => 'Community',
                'amount' => '8.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'service' => 'Baptism',
                'event_type' => 'Special',
                'amount' => '15.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'service' => 'Funeral Mass',
                'event_type' => 'Regular',
                'amount' => '2.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'service' => 'Funeral Mass',
                'event_type' => 'Community',
                'amount' => '9.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'service' => 'Funeral Mass',
                'event_type' => 'Special',
                'amount' => '16.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'service' => 'Anointing Of The Sick',
                'event_type' => 'Regular',
                'amount' => '3.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'service' => 'Anointing Of The Sick',
                'event_type' => 'Community',
                'amount' => '10.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'service' => 'Anointing Of The Sick',
                'event_type' => 'Special',
                'amount' => '17.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'service' => 'Blessing',
                'event_type' => 'Regular',
                'amount' => '4.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'service' => 'Blessing',
                'event_type' => 'Community',
                'amount' => '11.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'service' => 'Blessing',
                'event_type' => 'Special',
                'amount' => '18.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'service' => 'Kumpil',
                'event_type' => 'Regular',
                'amount' => '5.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'service' => 'Kumpil',
                'event_type' => 'Community',
                'amount' => '12.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'service' => 'Kumpil',
                'event_type' => 'Special',
                'amount' => '19.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'service' => 'First Communion',
                'event_type' => 'Regular',
                'amount' => '6.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'service' => 'First Communion',
                'event_type' => 'Community',
                'amount' => '13.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'service' => 'First Communion',
                'event_type' => 'Special',
                'amount' => '20.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'service' => 'Wedding',
                'event_type' => 'Regular',
                'amount' => '7.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'service' => 'Wedding',
                'event_type' => 'Community',
                'amount' => '14.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'service' => 'Wedding',
                'event_type' => 'Special',
                'amount' => '21.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}