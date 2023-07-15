<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('province')->delete();

        \DB::table('province')->insert(array (
            0 =>
            array (
                'id' => 1,
                'province_name' => 'Rizal',
            ),
            1 =>
            array (
                'id' => 2,
                'province_name' => 'Abra',
            ),
            2 =>
            array (
                'id' => 3,
                'province_name' => 'Agusan del Norte',
            ),
            3 =>
            array (
                'id' => 4,
                'province_name' => 'Agusan del Sur',
            ),
            4 =>
            array (
                'id' => 5,
                'province_name' => 'Aklan',
            ),
            5 =>
            array (
                'id' => 6,
                'province_name' => 'Albay',
            ),
            6 =>
            array (
                'id' => 7,
                'province_name' => 'Antique',
            ),
            7 =>
            array (
                'id' => 8,
                'province_name' => 'Apayao',
            ),
            8 =>
            array (
                'id' => 9,
                'province_name' => 'Aurora',
            ),
            9 =>
            array (
                'id' => 11,
                'province_name' => 'Bataan',
            ),
            10 =>
            array (
                'id' => 12,
                'province_name' => 'Basilan',
            ),
            11 =>
            array (
                'id' => 13,
                'province_name' => 'Batanes',
            ),
            12 =>
            array (
                'id' => 14,
                'province_name' => 'Batangas',
            ),
            13 =>
            array (
                'id' => 15,
                'province_name' => 'Benguet',
            ),
            14 =>
            array (
                'id' => 16,
                'province_name' => 'Biliran',
            ),
            15 =>
            array (
                'id' => 17,
                'province_name' => 'Bohol',
            ),
            16 =>
            array (
                'id' => 18,
                'province_name' => 'Bukidnon',
            ),
            17 =>
            array (
                'id' => 19,
                'province_name' => 'Bulacan',
            ),
            18 =>
            array (
                'id' => 20,
                'province_name' => 'Cagayan',
            ),
            19 =>
            array (
                'id' => 21,
                'province_name' => 'Camarines Norte',
            ),
            20 =>
            array (
                'id' => 22,
                'province_name' => 'Camarines Sur',
            ),
            21 =>
            array (
                'id' => 23,
                'province_name' => 'Camiguin',
            ),
            22 =>
            array (
                'id' => 24,
                'province_name' => 'Capiz',
            ),
            23 =>
            array (
                'id' => 25,
                'province_name' => 'Catanduanes',
            ),
            24 =>
            array (
                'id' => 26,
                'province_name' => 'Cavite',
            ),
            25 =>
            array (
                'id' => 27,
                'province_name' => 'Cebu',
            ),
            26 =>
            array (
                'id' => 28,
                'province_name' => 'Cotabato',
            ),
            27 =>
            array (
                'id' => 29,
                'province_name' => 'Davao de Oro',
            ),
            28 =>
            array (
                'id' => 30,
                'province_name' => 'Davao del Norte',
            ),
            29 =>
            array (
                'id' => 31,
                'province_name' => 'Davao del Sur',
            ),
            30 =>
            array (
                'id' => 32,
                'province_name' => 'Davao Occidental',
            ),
            31 =>
            array (
                'id' => 33,
                'province_name' => 'Davao Oriental',
            ),
            32 =>
            array (
                'id' => 34,
                'province_name' => 'Dinagat Islands',
            ),
            33 =>
            array (
                'id' => 35,
                'province_name' => 'Eastern Samar',
            ),
            34 =>
            array (
                'id' => 36,
                'province_name' => 'Guimaras',
            ),
            35 =>
            array (
                'id' => 37,
                'province_name' => 'Ifugao',
            ),
            36 =>
            array (
                'id' => 38,
                'province_name' => 'Ilocos Norte',
            ),
            37 =>
            array (
                'id' => 39,
                'province_name' => 'Ilocos Sur',
            ),
            38 =>
            array (
                'id' => 40,
                'province_name' => 'Iloilo',
            ),
            39 =>
            array (
                'id' => 41,
                'province_name' => 'Isabela',
            ),
            40 =>
            array (
                'id' => 42,
                'province_name' => 'Kalinga',
            ),
            41 =>
            array (
                'id' => 43,
                'province_name' => 'La Union',
            ),
            42 =>
            array (
                'id' => 44,
                'province_name' => 'Laguna',
            ),
            43 =>
            array (
                'id' => 45,
                'province_name' => 'Lanao del Norte',
            ),
            44 =>
            array (
                'id' => 46,
                'province_name' => 'Lanao del Sur',
            ),
            45 =>
            array (
                'id' => 47,
                'province_name' => 'Leyte',
            ),
            46 =>
            array (
                'id' => 48,
                'province_name' => 'Maguindanao',
            ),
            47 =>
            array (
                'id' => 49,
                'province_name' => 'Marinduque',
            ),
            48 =>
            array (
                'id' => 50,
                'province_name' => 'Masbate',
            ),
            49 =>
            array (
                'id' => 51,
                'province_name' => 'Misamis Occidental',
            ),
            50 =>
            array (
                'id' => 52,
                'province_name' => 'Misamis Oriental',
            ),
            51 =>
            array (
                'id' => 53,
                'province_name' => 'Mountain',
            ),
            52 =>
            array (
                'id' => 54,
                'province_name' => 'NCR',
            ),
            53 =>
            array (
                'id' => 55,
                'province_name' => 'Negros Occidental',
            ),
            54 =>
            array (
                'id' => 56,
                'province_name' => 'Negros Oriental',
            ),
            55 =>
            array (
                'id' => 57,
                'province_name' => 'Northern Samar',
            ),
            56 =>
            array (
                'id' => 58,
                'province_name' => 'Nueva Ecija',
            ),
            57 =>
            array (
                'id' => 59,
                'province_name' => 'Nueva Vizcaya',
            ),
            58 =>
            array (
                'id' => 60,
                'province_name' => 'Occidental Mindoro',
            ),
            59 =>
            array (
                'id' => 61,
                'province_name' => 'Palawan',
            ),
            60 =>
            array (
                'id' => 62,
                'province_name' => 'Pampanga',
            ),
            61 =>
            array (
                'id' => 63,
                'province_name' => 'Pangasinan',
            ),
            62 =>
            array (
                'id' => 64,
                'province_name' => 'Quezon',
            ),
            63 =>
            array (
                'id' => 65,
                'province_name' => 'Quirino',
            ),
            64 =>
            array (
                'id' => 66,
                'province_name' => 'Romblon',
            ),
            65 =>
            array (
                'id' => 67,
                'province_name' => 'Samar',
            ),
            66 =>
            array (
                'id' => 68,
                'province_name' => 'Sarangani',
            ),
            67 =>
            array (
                'id' => 69,
                'province_name' => 'Siquijor',
            ),
            68 =>
            array (
                'id' => 70,
                'province_name' => 'South Cotabato',
            ),
            69 =>
            array (
                'id' => 71,
                'province_name' => 'Southern Leyte',
            ),
            70 =>
            array (
                'id' => 72,
                'province_name' => 'Sultan Kudarat',
            ),
            71 =>
            array (
                'id' => 73,
                'province_name' => 'Sulu',
            ),
            72 =>
            array (
                'id' => 74,
                'province_name' => 'Surigao del Norte',
            ),
            73 =>
            array (
                'id' => 75,
                'province_name' => 'Surigao del Sur',
            ),
            74 =>
            array (
                'id' => 76,
                'province_name' => 'Tarlac',
            ),
            75 =>
            array (
                'id' => 77,
                'province_name' => 'Tawi-Tawi',
            ),
            76 =>
            array (
                'id' => 78,
                'province_name' => 'Zambales',
            ),
            77 =>
            array (
                'id' => 79,
                'province_name' => 'Zamboanga del Norte',
            ),
            78 =>
            array (
                'id' => 80,
                'province_name' => 'Zamboanga del Sur',
            ),
            79 =>
            array (
                'id' => 81,
                'province_name' => 'Zamboanga Sibugay',
            ),
        ));


    }
}
