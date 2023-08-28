<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CalendartimeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('calendartime')->delete();
        
        \DB::table('calendartime')->insert(array (
            0 => 
            array (
                'id' => 1,
                'year' => 2023,
                'month' => 8,
                'day' => 29,
                'start_time' => '08:22:00',
                'end_time' => '08:23:00',
                'service' => 'Baptism',
                'event_type' => 'Regular',
                'slot' => 1,
                'created_at' => '2023-08-28 08:22:26',
                'updated_at' => '2023-08-28 08:23:58',
            ),
            1 => 
            array (
                'id' => 2,
                'year' => 2023,
                'month' => 8,
                'day' => 29,
                'start_time' => '08:22:00',
                'end_time' => '08:24:00',
                'service' => 'Funeral Mass',
                'event_type' => 'Regular',
                'slot' => 1,
                'created_at' => '2023-08-28 08:22:32',
                'updated_at' => '2023-08-28 08:24:47',
            ),
            2 => 
            array (
                'id' => 3,
                'year' => 2023,
                'month' => 8,
                'day' => 29,
                'start_time' => '08:22:00',
                'end_time' => '08:24:00',
                'service' => 'Anointing Of The Sick',
                'event_type' => 'Regular',
                'slot' => 1,
                'created_at' => '2023-08-28 08:22:42',
                'updated_at' => '2023-08-28 08:25:57',
            ),
            3 => 
            array (
                'id' => 4,
                'year' => 2023,
                'month' => 8,
                'day' => 29,
                'start_time' => '08:22:00',
                'end_time' => '08:25:00',
                'service' => 'Blessing',
                'event_type' => 'Regular',
                'slot' => 1,
                'created_at' => '2023-08-28 08:22:55',
                'updated_at' => '2023-08-28 08:33:05',
            ),
            4 => 
            array (
                'id' => 5,
                'year' => 2023,
                'month' => 8,
                'day' => 29,
                'start_time' => '08:23:00',
                'end_time' => '08:26:00',
                'service' => 'Kumpil',
                'event_type' => 'Regular',
                'slot' => 1,
                'created_at' => '2023-08-28 08:23:09',
                'updated_at' => '2023-08-28 08:39:22',
            ),
            5 => 
            array (
                'id' => 6,
                'year' => 2023,
                'month' => 8,
                'day' => 29,
                'start_time' => '08:23:00',
                'end_time' => '08:25:00',
                'service' => 'First Communion',
                'event_type' => 'Regular',
                'slot' => 1,
                'created_at' => '2023-08-28 08:23:17',
                'updated_at' => '2023-08-28 08:45:59',
            ),
            6 => 
            array (
                'id' => 7,
                'year' => 2023,
                'month' => 8,
                'day' => 29,
                'start_time' => '08:23:00',
                'end_time' => '08:25:00',
                'service' => 'Wedding',
                'event_type' => 'Regular',
                'slot' => 1,
                'created_at' => '2023-08-28 08:23:30',
                'updated_at' => '2023-08-28 08:54:59',
            ),
        ));
        
        
    }
}