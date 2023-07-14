<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MunicipalityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('municipality')->delete();
        
        \DB::table('municipality')->insert(array (
            0 => 
            array (
                'id' => 7,
                'province_id' => 2,
                'municipality_name' => 'Bangued',
            ),
            1 => 
            array (
                'id' => 8,
                'province_id' => 2,
                'municipality_name' => 'Daguioman',
            ),
            2 => 
            array (
                'id' => 9,
                'province_id' => 2,
                'municipality_name' => 'Lacub',
            ),
            3 => 
            array (
                'id' => 10,
                'province_id' => 1,
                'municipality_name' => 'Angono',
            ),
            4 => 
            array (
                'id' => 11,
                'province_id' => 1,
                'municipality_name' => 'Cainta',
            ),
            5 => 
            array (
                'id' => 12,
                'province_id' => 1,
                'municipality_name' => 'Pililla',
            ),
            6 => 
            array (
                'id' => 13,
                'province_id' => 2,
                'municipality_name' => 'Boliney',
            ),
            7 => 
            array (
                'id' => 14,
                'province_id' => 2,
                'municipality_name' => 'Bucay',
            ),
            8 => 
            array (
                'id' => 15,
                'province_id' => 2,
                'municipality_name' => 'Bucloc',
            ),
            9 => 
            array (
                'id' => 16,
                'province_id' => 2,
                'municipality_name' => 'Danglas',
            ),
            10 => 
            array (
                'id' => 17,
                'province_id' => 2,
                'municipality_name' => 'Dolores',
            ),
            11 => 
            array (
                'id' => 18,
                'province_id' => 2,
                'municipality_name' => 'La Paz',
            ),
            12 => 
            array (
                'id' => 19,
                'province_id' => 2,
                'municipality_name' => 'Lagangilang',
            ),
            13 => 
            array (
                'id' => 20,
                'province_id' => 2,
                'municipality_name' => 'Lagayan',
            ),
            14 => 
            array (
                'id' => 21,
                'province_id' => 2,
                'municipality_name' => 'Langiden',
            ),
            15 => 
            array (
                'id' => 22,
                'province_id' => 2,
            'municipality_name' => 'Licuan-Baay (Licuan)',
            ),
            16 => 
            array (
                'id' => 23,
                'province_id' => 2,
                'municipality_name' => 'Luba',
            ),
            17 => 
            array (
                'id' => 24,
                'province_id' => 2,
                'municipality_name' => 'Malibcong',
            ),
            18 => 
            array (
                'id' => 25,
                'province_id' => 2,
                'municipality_name' => 'Manabo',
            ),
            19 => 
            array (
                'id' => 26,
                'province_id' => 2,
                'municipality_name' => 'Pe&ntilde;arrubia',
            ),
            20 => 
            array (
                'id' => 27,
                'province_id' => 2,
                'municipality_name' => 'Pidigan',
            ),
            21 => 
            array (
                'id' => 28,
                'province_id' => 2,
                'municipality_name' => 'Pilar',
            ),
            22 => 
            array (
                'id' => 29,
                'province_id' => 2,
                'municipality_name' => 'Sallapadan',
            ),
            23 => 
            array (
                'id' => 30,
                'province_id' => 2,
                'municipality_name' => 'San Isidro',
            ),
            24 => 
            array (
                'id' => 31,
                'province_id' => 2,
                'municipality_name' => 'San Juan',
            ),
            25 => 
            array (
                'id' => 32,
                'province_id' => 2,
                'municipality_name' => 'San Quintin',
            ),
            26 => 
            array (
                'id' => 33,
                'province_id' => 2,
                'municipality_name' => 'Tayum',
            ),
            27 => 
            array (
                'id' => 34,
                'province_id' => 2,
                'municipality_name' => 'Tineg',
            ),
            28 => 
            array (
                'id' => 35,
                'province_id' => 2,
                'municipality_name' => 'Tubo',
            ),
            29 => 
            array (
                'id' => 36,
                'province_id' => 2,
                'municipality_name' => 'Villaviciosa',
            ),
            30 => 
            array (
                'id' => 37,
                'province_id' => 1,
                'municipality_name' => 'Antipolo',
            ),
            31 => 
            array (
                'id' => 38,
                'province_id' => 1,
                'municipality_name' => 'Baras',
            ),
            32 => 
            array (
                'id' => 39,
                'province_id' => 1,
                'municipality_name' => 'Binangonan',
            ),
            33 => 
            array (
                'id' => 40,
                'province_id' => 1,
                'municipality_name' => 'Cardona',
            ),
            34 => 
            array (
                'id' => 41,
                'province_id' => 1,
                'municipality_name' => 'Jalajala',
            ),
            35 => 
            array (
                'id' => 42,
                'province_id' => 1,
                'municipality_name' => 'Morong',
            ),
            36 => 
            array (
                'id' => 43,
                'province_id' => 1,
            'municipality_name' => 'Rodriguez (Montalban)',
            ),
            37 => 
            array (
                'id' => 44,
                'province_id' => 1,
                'municipality_name' => 'San Mateo',
            ),
            38 => 
            array (
                'id' => 45,
                'province_id' => 1,
                'municipality_name' => 'Tanay',
            ),
            39 => 
            array (
                'id' => 46,
                'province_id' => 1,
                'municipality_name' => 'Taytay',
            ),
            40 => 
            array (
                'id' => 47,
                'province_id' => 1,
                'municipality_name' => 'Teresa',
            ),
            41 => 
            array (
                'id' => 48,
                'province_id' => 3,
                'municipality_name' => 'Buenavista',
            ),
            42 => 
            array (
                'id' => 49,
                'province_id' => 3,
                'municipality_name' => 'Butuan',
            ),
            43 => 
            array (
                'id' => 50,
                'province_id' => 3,
                'municipality_name' => 'Cabadbaran',
            ),
            44 => 
            array (
                'id' => 51,
                'province_id' => 3,
                'municipality_name' => 'Carmen',
            ),
            45 => 
            array (
                'id' => 52,
                'province_id' => 3,
                'municipality_name' => 'Jabonga',
            ),
            46 => 
            array (
                'id' => 53,
                'province_id' => 3,
                'municipality_name' => 'Kitcharao',
            ),
            47 => 
            array (
                'id' => 54,
                'province_id' => 3,
                'municipality_name' => 'Las Nieves',
            ),
            48 => 
            array (
                'id' => 55,
                'province_id' => 3,
                'municipality_name' => 'Magallanes',
            ),
            49 => 
            array (
                'id' => 56,
                'province_id' => 3,
                'municipality_name' => 'Nasipit',
            ),
            50 => 
            array (
                'id' => 57,
                'province_id' => 3,
                'municipality_name' => 'Remedios T. Romualdez',
            ),
            51 => 
            array (
                'id' => 58,
                'province_id' => 3,
                'municipality_name' => 'Santiago',
            ),
            52 => 
            array (
                'id' => 59,
                'province_id' => 3,
                'municipality_name' => 'Tubay',
            ),
            53 => 
            array (
                'id' => 60,
                'province_id' => 4,
                'municipality_name' => 'Bayugan',
            ),
            54 => 
            array (
                'id' => 61,
                'province_id' => 4,
                'municipality_name' => 'Bunawan',
            ),
            55 => 
            array (
                'id' => 62,
                'province_id' => 4,
                'municipality_name' => 'Esperanza',
            ),
            56 => 
            array (
                'id' => 63,
                'province_id' => 4,
                'municipality_name' => 'La Paz',
            ),
            57 => 
            array (
                'id' => 64,
                'province_id' => 4,
                'municipality_name' => 'Loreto',
            ),
            58 => 
            array (
                'id' => 65,
                'province_id' => 4,
                'municipality_name' => 'Prosperidad',
            ),
            59 => 
            array (
                'id' => 66,
                'province_id' => 4,
                'municipality_name' => 'Rosario',
            ),
            60 => 
            array (
                'id' => 67,
                'province_id' => 4,
                'municipality_name' => 'San Francisco',
            ),
            61 => 
            array (
                'id' => 68,
                'province_id' => 4,
                'municipality_name' => 'San Luis',
            ),
            62 => 
            array (
                'id' => 69,
                'province_id' => 4,
                'municipality_name' => 'Santa Josefa',
            ),
            63 => 
            array (
                'id' => 70,
                'province_id' => 4,
                'municipality_name' => 'Sibagat',
            ),
            64 => 
            array (
                'id' => 71,
                'province_id' => 4,
                'municipality_name' => 'Talacogon',
            ),
            65 => 
            array (
                'id' => 72,
                'province_id' => 4,
                'municipality_name' => 'Trento',
            ),
            66 => 
            array (
                'id' => 73,
                'province_id' => 4,
                'municipality_name' => 'Veruela',
            ),
            67 => 
            array (
                'id' => 74,
                'province_id' => 5,
                'municipality_name' => 'Altavas',
            ),
            68 => 
            array (
                'id' => 75,
                'province_id' => 5,
                'municipality_name' => 'Banga',
            ),
            69 => 
            array (
                'id' => 76,
                'province_id' => 5,
                'municipality_name' => 'Buruanga',
            ),
            70 => 
            array (
                'id' => 77,
                'province_id' => 5,
                'municipality_name' => 'Kalibo',
            ),
            71 => 
            array (
                'id' => 78,
                'province_id' => 5,
                'municipality_name' => 'Libacao',
            ),
            72 => 
            array (
                'id' => 79,
                'province_id' => 5,
                'municipality_name' => 'Makato',
            ),
            73 => 
            array (
                'id' => 80,
                'province_id' => 5,
                'municipality_name' => 'Malinao',
            ),
            74 => 
            array (
                'id' => 81,
                'province_id' => 5,
                'municipality_name' => 'New Washington',
            ),
            75 => 
            array (
                'id' => 82,
                'province_id' => 5,
                'municipality_name' => 'Tangalan',
            ),
            76 => 
            array (
                'id' => 83,
                'province_id' => 5,
                'municipality_name' => 'Balete',
            ),
            77 => 
            array (
                'id' => 84,
                'province_id' => 5,
                'municipality_name' => 'Batan',
            ),
            78 => 
            array (
                'id' => 85,
                'province_id' => 5,
                'municipality_name' => 'Ibajay',
            ),
            79 => 
            array (
                'id' => 86,
                'province_id' => 5,
                'municipality_name' => 'Lezo',
            ),
            80 => 
            array (
                'id' => 87,
                'province_id' => 5,
                'municipality_name' => 'Madalag',
            ),
            81 => 
            array (
                'id' => 88,
                'province_id' => 5,
                'municipality_name' => 'Malay',
            ),
            82 => 
            array (
                'id' => 89,
                'province_id' => 5,
                'municipality_name' => 'Nabas',
            ),
            83 => 
            array (
                'id' => 90,
                'province_id' => 5,
                'municipality_name' => 'Numancia',
            ),
            84 => 
            array (
                'id' => 91,
                'province_id' => 7,
                'municipality_name' => 'Anini-y',
            ),
            85 => 
            array (
                'id' => 92,
                'province_id' => 7,
                'municipality_name' => 'Belison',
            ),
            86 => 
            array (
                'id' => 93,
                'province_id' => 7,
                'municipality_name' => 'Caluya',
            ),
            87 => 
            array (
                'id' => 94,
                'province_id' => 7,
                'municipality_name' => 'Hamtic',
            ),
            88 => 
            array (
                'id' => 95,
                'province_id' => 7,
                'municipality_name' => 'Libertad',
            ),
            89 => 
            array (
                'id' => 96,
                'province_id' => 7,
                'municipality_name' => 'Patnongon',
            ),
            90 => 
            array (
                'id' => 97,
                'province_id' => 7,
                'municipality_name' => 'San Remigio',
            ),
            91 => 
            array (
                'id' => 98,
                'province_id' => 7,
                'municipality_name' => 'Sibalom',
            ),
            92 => 
            array (
                'id' => 99,
                'province_id' => 7,
            'municipality_name' => 'Tobias Fornier (Dao)',
            ),
            93 => 
            array (
                'id' => 100,
                'province_id' => 7,
                'municipality_name' => 'Barbaza',
            ),
            94 => 
            array (
                'id' => 101,
                'province_id' => 7,
                'municipality_name' => 'Bugasong',
            ),
            95 => 
            array (
                'id' => 102,
                'province_id' => 7,
                'municipality_name' => 'Culasi',
            ),
            96 => 
            array (
                'id' => 103,
                'province_id' => 7,
                'municipality_name' => 'Laua-an',
            ),
            97 => 
            array (
                'id' => 104,
                'province_id' => 7,
                'municipality_name' => 'Pandan',
            ),
            98 => 
            array (
                'id' => 105,
                'province_id' => 7,
                'municipality_name' => 'San Jose de Buenavista',
            ),
            99 => 
            array (
                'id' => 106,
                'province_id' => 7,
                'municipality_name' => 'Sebaste',
            ),
            100 => 
            array (
                'id' => 107,
                'province_id' => 7,
                'municipality_name' => 'Tibiao',
            ),
            101 => 
            array (
                'id' => 108,
                'province_id' => 7,
                'municipality_name' => 'Valderrama',
            ),
            102 => 
            array (
                'id' => 109,
                'province_id' => 6,
                'municipality_name' => 'Bacacay',
            ),
            103 => 
            array (
                'id' => 110,
                'province_id' => 6,
            'municipality_name' => 'Daraga (Locsin)',
            ),
            104 => 
            array (
                'id' => 111,
                'province_id' => 6,
                'municipality_name' => 'Jovellar',
            ),
            105 => 
            array (
                'id' => 112,
                'province_id' => 6,
                'municipality_name' => 'Libon',
            ),
            106 => 
            array (
                'id' => 113,
                'province_id' => 6,
                'municipality_name' => 'Malilipot',
            ),
            107 => 
            array (
                'id' => 114,
                'province_id' => 6,
                'municipality_name' => 'Manito',
            ),
            108 => 
            array (
                'id' => 115,
                'province_id' => 6,
                'municipality_name' => 'Pio Duran',
            ),
            109 => 
            array (
                'id' => 116,
                'province_id' => 6,
                'municipality_name' => 'Rapu-Rapu',
            ),
            110 => 
            array (
                'id' => 117,
                'province_id' => 6,
                'municipality_name' => 'Tabaco',
            ),
            111 => 
            array (
                'id' => 118,
                'province_id' => 6,
                'municipality_name' => 'Camalig',
            ),
            112 => 
            array (
                'id' => 119,
                'province_id' => 6,
                'municipality_name' => 'Guinobatan',
            ),
            113 => 
            array (
                'id' => 120,
                'province_id' => 6,
                'municipality_name' => 'Legazpi',
            ),
            114 => 
            array (
                'id' => 121,
                'province_id' => 6,
                'municipality_name' => 'Ligao',
            ),
            115 => 
            array (
                'id' => 122,
                'province_id' => 6,
                'municipality_name' => 'Malinao',
            ),
            116 => 
            array (
                'id' => 123,
                'province_id' => 6,
                'municipality_name' => 'Oas',
            ),
            117 => 
            array (
                'id' => 124,
                'province_id' => 6,
                'municipality_name' => 'Polangui',
            ),
            118 => 
            array (
                'id' => 125,
                'province_id' => 6,
                'municipality_name' => 'Santo Domingo',
            ),
            119 => 
            array (
                'id' => 126,
                'province_id' => 6,
                'municipality_name' => 'Tiwi',
            ),
            120 => 
            array (
                'id' => 127,
                'province_id' => 8,
                'municipality_name' => 'Calanasan',
            ),
            121 => 
            array (
                'id' => 128,
                'province_id' => 8,
                'municipality_name' => 'Flora',
            ),
            122 => 
            array (
                'id' => 129,
                'province_id' => 8,
                'municipality_name' => 'Luna',
            ),
            123 => 
            array (
                'id' => 130,
                'province_id' => 8,
                'municipality_name' => 'Santa Marcela',
            ),
            124 => 
            array (
                'id' => 131,
                'province_id' => 8,
                'municipality_name' => 'Conner',
            ),
            125 => 
            array (
                'id' => 132,
                'province_id' => 8,
                'municipality_name' => 'Kabugao',
            ),
            126 => 
            array (
                'id' => 133,
                'province_id' => 8,
                'municipality_name' => 'Pudtol',
            ),
            127 => 
            array (
                'id' => 134,
                'province_id' => 9,
                'municipality_name' => 'Baler',
            ),
            128 => 
            array (
                'id' => 135,
                'province_id' => 9,
                'municipality_name' => 'Dilasag',
            ),
            129 => 
            array (
                'id' => 136,
                'province_id' => 9,
                'municipality_name' => 'Dingalan',
            ),
            130 => 
            array (
                'id' => 137,
                'province_id' => 9,
                'municipality_name' => 'Maria Aurora',
            ),
            131 => 
            array (
                'id' => 138,
                'province_id' => 9,
                'municipality_name' => 'Casiguran',
            ),
            132 => 
            array (
                'id' => 139,
                'province_id' => 9,
                'municipality_name' => 'Dinalungan',
            ),
            133 => 
            array (
                'id' => 140,
                'province_id' => 9,
                'municipality_name' => 'Dipaculao',
            ),
            134 => 
            array (
                'id' => 141,
                'province_id' => 9,
                'municipality_name' => 'San Luis',
            ),
            135 => 
            array (
                'id' => 142,
                'province_id' => 12,
                'municipality_name' => 'Akbar',
            ),
            136 => 
            array (
                'id' => 143,
                'province_id' => 12,
                'municipality_name' => 'Hadji Mohammad Ajul',
            ),
            137 => 
            array (
                'id' => 144,
                'province_id' => 12,
                'municipality_name' => 'Isabela City',
            ),
            138 => 
            array (
                'id' => 145,
                'province_id' => 12,
                'municipality_name' => 'Lantawan',
            ),
            139 => 
            array (
                'id' => 146,
                'province_id' => 12,
                'municipality_name' => 'Sumisip',
            ),
            140 => 
            array (
                'id' => 147,
                'province_id' => 12,
                'municipality_name' => 'Tipo-Tipo',
            ),
            141 => 
            array (
                'id' => 148,
                'province_id' => 12,
                'municipality_name' => 'Ungkaya Pukan',
            ),
            142 => 
            array (
                'id' => 149,
                'province_id' => 12,
                'municipality_name' => 'Al-Barka',
            ),
            143 => 
            array (
                'id' => 150,
                'province_id' => 12,
                'municipality_name' => 'Hadji Muhtamad',
            ),
            144 => 
            array (
                'id' => 151,
                'province_id' => 12,
                'municipality_name' => 'Lamitan',
            ),
            145 => 
            array (
                'id' => 152,
                'province_id' => 12,
                'municipality_name' => 'Maluso',
            ),
            146 => 
            array (
                'id' => 153,
                'province_id' => 12,
                'municipality_name' => 'Tabuan-Lasa',
            ),
            147 => 
            array (
                'id' => 154,
                'province_id' => 12,
                'municipality_name' => 'Tuburan',
            ),
            148 => 
            array (
                'id' => 155,
                'province_id' => 11,
                'municipality_name' => 'Samal',
            ),
            149 => 
            array (
                'id' => 156,
                'province_id' => 11,
                'municipality_name' => 'Abucay',
            ),
            150 => 
            array (
                'id' => 157,
                'province_id' => 11,
                'municipality_name' => 'Balanga',
            ),
            151 => 
            array (
                'id' => 158,
                'province_id' => 11,
                'municipality_name' => 'Hermosa',
            ),
            152 => 
            array (
                'id' => 159,
                'province_id' => 11,
                'municipality_name' => 'Mariveles',
            ),
            153 => 
            array (
                'id' => 160,
                'province_id' => 11,
                'municipality_name' => 'Orani',
            ),
            154 => 
            array (
                'id' => 161,
                'province_id' => 11,
                'municipality_name' => 'Pilar',
            ),
            155 => 
            array (
                'id' => 162,
                'province_id' => 11,
                'municipality_name' => 'Bagac',
            ),
            156 => 
            array (
                'id' => 163,
                'province_id' => 11,
                'municipality_name' => 'Dinalupihan',
            ),
            157 => 
            array (
                'id' => 164,
                'province_id' => 11,
                'municipality_name' => 'Limay',
            ),
            158 => 
            array (
                'id' => 165,
                'province_id' => 11,
                'municipality_name' => 'Morong',
            ),
            159 => 
            array (
                'id' => 166,
                'province_id' => 11,
                'municipality_name' => 'Orion',
            ),
            160 => 
            array (
                'id' => 167,
                'province_id' => 13,
                'municipality_name' => 'Basco',
            ),
            161 => 
            array (
                'id' => 168,
                'province_id' => 13,
                'municipality_name' => 'Ivana',
            ),
            162 => 
            array (
                'id' => 169,
                'province_id' => 13,
                'municipality_name' => 'Sabtang',
            ),
            163 => 
            array (
                'id' => 170,
                'province_id' => 13,
                'municipality_name' => 'Itbayat',
            ),
            164 => 
            array (
                'id' => 171,
                'province_id' => 13,
                'municipality_name' => 'Mahatao',
            ),
            165 => 
            array (
                'id' => 172,
                'province_id' => 13,
                'municipality_name' => 'Uyugan',
            ),
            166 => 
            array (
                'id' => 173,
                'province_id' => 14,
                'municipality_name' => 'Agoncillo',
            ),
            167 => 
            array (
                'id' => 174,
                'province_id' => 14,
                'municipality_name' => 'Balayan',
            ),
            168 => 
            array (
                'id' => 175,
                'province_id' => 14,
                'municipality_name' => 'Batangas City',
            ),
            169 => 
            array (
                'id' => 176,
                'province_id' => 14,
                'municipality_name' => 'Calaca',
            ),
            170 => 
            array (
                'id' => 177,
                'province_id' => 14,
                'municipality_name' => 'Cuenca',
            ),
            171 => 
            array (
                'id' => 178,
                'province_id' => 14,
                'municipality_name' => 'Laurel',
            ),
            172 => 
            array (
                'id' => 179,
                'province_id' => 14,
                'municipality_name' => 'Lian',
            ),
            173 => 
            array (
                'id' => 180,
                'province_id' => 14,
                'municipality_name' => 'Lobo',
            ),
            174 => 
            array (
                'id' => 181,
                'province_id' => 14,
                'municipality_name' => 'Malvar',
            ),
            175 => 
            array (
                'id' => 182,
                'province_id' => 14,
                'municipality_name' => 'Nasugbu',
            ),
            176 => 
            array (
                'id' => 183,
                'province_id' => 14,
                'municipality_name' => 'Rosario',
            ),
            177 => 
            array (
                'id' => 184,
                'province_id' => 14,
                'municipality_name' => 'San Juan',
            ),
            178 => 
            array (
                'id' => 185,
                'province_id' => 14,
                'municipality_name' => 'San Nicolas',
            ),
            179 => 
            array (
                'id' => 186,
                'province_id' => 14,
                'municipality_name' => 'Santa Teresita',
            ),
            180 => 
            array (
                'id' => 187,
                'province_id' => 14,
                'municipality_name' => 'Taal',
            ),
            181 => 
            array (
                'id' => 188,
                'province_id' => 14,
                'municipality_name' => 'Tanauan',
            ),
            182 => 
            array (
                'id' => 189,
                'province_id' => 14,
                'municipality_name' => 'Tingloy',
            ),
            183 => 
            array (
                'id' => 190,
                'province_id' => 14,
                'municipality_name' => 'Alitagtag',
            ),
            184 => 
            array (
                'id' => 191,
                'province_id' => 14,
                'municipality_name' => 'Balete',
            ),
            185 => 
            array (
                'id' => 192,
                'province_id' => 14,
                'municipality_name' => 'Bauan',
            ),
            186 => 
            array (
                'id' => 193,
                'province_id' => 14,
                'municipality_name' => 'Calatagan',
            ),
            187 => 
            array (
                'id' => 194,
                'province_id' => 14,
                'municipality_name' => 'Ibaan',
            ),
            188 => 
            array (
                'id' => 195,
                'province_id' => 14,
                'municipality_name' => 'Lemery',
            ),
            189 => 
            array (
                'id' => 196,
                'province_id' => 14,
                'municipality_name' => 'Lipa',
            ),
            190 => 
            array (
                'id' => 197,
                'province_id' => 14,
                'municipality_name' => 'Mabini',
            ),
            191 => 
            array (
                'id' => 198,
                'province_id' => 14,
                'municipality_name' => 'Mataasnakahoy',
            ),
            192 => 
            array (
                'id' => 199,
                'province_id' => 14,
                'municipality_name' => 'Padre Garcia',
            ),
            193 => 
            array (
                'id' => 200,
                'province_id' => 14,
                'municipality_name' => 'San Jose',
            ),
            194 => 
            array (
                'id' => 201,
                'province_id' => 14,
                'municipality_name' => 'San Luis',
            ),
            195 => 
            array (
                'id' => 202,
                'province_id' => 14,
                'municipality_name' => 'San Pascual',
            ),
            196 => 
            array (
                'id' => 203,
                'province_id' => 14,
                'municipality_name' => 'Santo Tomas',
            ),
            197 => 
            array (
                'id' => 204,
                'province_id' => 14,
                'municipality_name' => 'Talisay',
            ),
            198 => 
            array (
                'id' => 205,
                'province_id' => 14,
                'municipality_name' => 'Taysan',
            ),
            199 => 
            array (
                'id' => 206,
                'province_id' => 14,
                'municipality_name' => 'Tuy',
            ),
            200 => 
            array (
                'id' => 207,
                'province_id' => 15,
                'municipality_name' => 'Atok',
            ),
            201 => 
            array (
                'id' => 208,
                'province_id' => 15,
                'municipality_name' => 'Bakun',
            ),
            202 => 
            array (
                'id' => 209,
                'province_id' => 15,
                'municipality_name' => 'Buguias',
            ),
            203 => 
            array (
                'id' => 210,
                'province_id' => 15,
                'municipality_name' => 'Kabayan',
            ),
            204 => 
            array (
                'id' => 211,
                'province_id' => 15,
                'municipality_name' => 'Kibungan',
            ),
            205 => 
            array (
                'id' => 212,
                'province_id' => 15,
                'municipality_name' => 'Mankayan',
            ),
            206 => 
            array (
                'id' => 213,
                'province_id' => 15,
                'municipality_name' => 'Tuba',
            ),
            207 => 
            array (
                'id' => 214,
                'province_id' => 15,
                'municipality_name' => 'Baguio',
            ),
            208 => 
            array (
                'id' => 215,
                'province_id' => 15,
                'municipality_name' => 'Bokod',
            ),
            209 => 
            array (
                'id' => 216,
                'province_id' => 15,
                'municipality_name' => 'Itogon',
            ),
            210 => 
            array (
                'id' => 217,
                'province_id' => 15,
                'municipality_name' => 'Kapangan',
            ),
            211 => 
            array (
                'id' => 218,
                'province_id' => 15,
                'municipality_name' => 'La Trinidad',
            ),
            212 => 
            array (
                'id' => 219,
                'province_id' => 15,
                'municipality_name' => 'Sablan',
            ),
            213 => 
            array (
                'id' => 220,
                'province_id' => 15,
                'municipality_name' => 'Tublay',
            ),
            214 => 
            array (
                'id' => 221,
                'province_id' => 16,
                'municipality_name' => 'Almeria',
            ),
            215 => 
            array (
                'id' => 222,
                'province_id' => 16,
                'municipality_name' => 'Cabucgayan',
            ),
            216 => 
            array (
                'id' => 223,
                'province_id' => 16,
                'municipality_name' => 'Culaba',
            ),
            217 => 
            array (
                'id' => 224,
                'province_id' => 16,
                'municipality_name' => 'Maripipi',
            ),
            218 => 
            array (
                'id' => 225,
                'province_id' => 16,
                'municipality_name' => 'Biliran',
            ),
            219 => 
            array (
                'id' => 226,
                'province_id' => 16,
                'municipality_name' => 'Caibiran',
            ),
            220 => 
            array (
                'id' => 227,
                'province_id' => 16,
                'municipality_name' => 'Kawayan',
            ),
            221 => 
            array (
                'id' => 228,
                'province_id' => 16,
                'municipality_name' => 'Naval',
            ),
            222 => 
            array (
                'id' => 229,
                'province_id' => 17,
                'municipality_name' => 'Alburquerque',
            ),
            223 => 
            array (
                'id' => 230,
                'province_id' => 17,
                'municipality_name' => 'Anda',
            ),
            224 => 
            array (
                'id' => 231,
                'province_id' => 17,
                'municipality_name' => 'Baclayon',
            ),
            225 => 
            array (
                'id' => 232,
                'province_id' => 17,
                'municipality_name' => 'Batuan',
            ),
            226 => 
            array (
                'id' => 233,
                'province_id' => 17,
                'municipality_name' => 'Bilar',
            ),
            227 => 
            array (
                'id' => 234,
                'province_id' => 17,
                'municipality_name' => 'Calape',
            ),
            228 => 
            array (
                'id' => 235,
                'province_id' => 17,
                'municipality_name' => 'Carmen',
            ),
            229 => 
            array (
                'id' => 236,
                'province_id' => 17,
                'municipality_name' => 'Clarin',
            ),
            230 => 
            array (
                'id' => 237,
                'province_id' => 17,
                'municipality_name' => 'Cortes',
            ),
            231 => 
            array (
                'id' => 238,
                'province_id' => 17,
                'municipality_name' => 'Danao',
            ),
            232 => 
            array (
                'id' => 239,
                'province_id' => 17,
                'municipality_name' => 'Dimiao',
            ),
            233 => 
            array (
                'id' => 240,
                'province_id' => 17,
                'municipality_name' => 'Garcia Hernandez',
            ),
            234 => 
            array (
                'id' => 241,
                'province_id' => 17,
                'municipality_name' => 'Guindulman',
            ),
            235 => 
            array (
                'id' => 242,
                'province_id' => 17,
                'municipality_name' => 'Jagna',
            ),
            236 => 
            array (
                'id' => 243,
                'province_id' => 17,
                'municipality_name' => 'Loay',
            ),
            237 => 
            array (
                'id' => 244,
                'province_id' => 17,
                'municipality_name' => 'Loon',
            ),
            238 => 
            array (
                'id' => 245,
                'province_id' => 17,
                'municipality_name' => 'Maribojoc',
            ),
            239 => 
            array (
                'id' => 246,
                'province_id' => 17,
                'municipality_name' => 'Pilar',
            ),
            240 => 
            array (
                'id' => 247,
                'province_id' => 17,
            'municipality_name' => 'Sagbayan (Borja)',
            ),
            241 => 
            array (
                'id' => 248,
                'province_id' => 17,
                'municipality_name' => 'San Miguel',
            ),
            242 => 
            array (
                'id' => 249,
                'province_id' => 17,
                'municipality_name' => 'Sierra Bullones',
            ),
            243 => 
            array (
                'id' => 250,
                'province_id' => 17,
                'municipality_name' => 'Tagbilaran',
            ),
            244 => 
            array (
                'id' => 251,
                'province_id' => 17,
                'municipality_name' => 'Trinidad',
            ),
            245 => 
            array (
                'id' => 252,
                'province_id' => 17,
                'municipality_name' => 'Ubay',
            ),
            246 => 
            array (
                'id' => 253,
                'province_id' => 17,
                'municipality_name' => 'Alicia',
            ),
            247 => 
            array (
                'id' => 254,
                'province_id' => 17,
                'municipality_name' => 'Antequera',
            ),
            248 => 
            array (
                'id' => 255,
                'province_id' => 17,
                'municipality_name' => 'Balilihan',
            ),
            249 => 
            array (
                'id' => 256,
                'province_id' => 17,
                'municipality_name' => 'Bien Unido',
            ),
            250 => 
            array (
                'id' => 257,
                'province_id' => 17,
                'municipality_name' => 'Buenavista',
            ),
            251 => 
            array (
                'id' => 258,
                'province_id' => 17,
                'municipality_name' => 'Candijay',
            ),
            252 => 
            array (
                'id' => 259,
                'province_id' => 17,
                'municipality_name' => 'Catigbian',
            ),
            253 => 
            array (
                'id' => 260,
                'province_id' => 17,
                'municipality_name' => 'Corella',
            ),
            254 => 
            array (
                'id' => 261,
                'province_id' => 17,
                'municipality_name' => 'Dagohoy',
            ),
            255 => 
            array (
                'id' => 262,
                'province_id' => 17,
                'municipality_name' => 'Dauis',
            ),
            256 => 
            array (
                'id' => 263,
                'province_id' => 17,
                'municipality_name' => 'Duero',
            ),
            257 => 
            array (
                'id' => 264,
                'province_id' => 17,
                'municipality_name' => 'Getafe',
            ),
            258 => 
            array (
                'id' => 265,
                'province_id' => 17,
                'municipality_name' => 'Inabanga',
            ),
            259 => 
            array (
                'id' => 266,
                'province_id' => 17,
                'municipality_name' => 'Lila',
            ),
            260 => 
            array (
                'id' => 267,
                'province_id' => 17,
                'municipality_name' => 'Loboc',
            ),
            261 => 
            array (
                'id' => 268,
                'province_id' => 17,
                'municipality_name' => 'Mabini',
            ),
            262 => 
            array (
                'id' => 269,
                'province_id' => 17,
                'municipality_name' => 'Panglao',
            ),
            263 => 
            array (
                'id' => 270,
                'province_id' => 17,
            'municipality_name' => 'President Carlos P. Garcia (Pitogo)',
            ),
            264 => 
            array (
                'id' => 271,
                'province_id' => 17,
                'municipality_name' => 'San Isidro',
            ),
            265 => 
            array (
                'id' => 272,
                'province_id' => 17,
                'municipality_name' => 'Sevilla',
            ),
            266 => 
            array (
                'id' => 273,
                'province_id' => 17,
                'municipality_name' => 'Sikatuna',
            ),
            267 => 
            array (
                'id' => 274,
                'province_id' => 17,
                'municipality_name' => 'Talibon',
            ),
            268 => 
            array (
                'id' => 275,
                'province_id' => 17,
                'municipality_name' => 'Tubigon',
            ),
            269 => 
            array (
                'id' => 276,
                'province_id' => 18,
                'municipality_name' => 'Baungon',
            ),
            270 => 
            array (
                'id' => 277,
                'province_id' => 18,
                'municipality_name' => 'Damulog',
            ),
            271 => 
            array (
                'id' => 278,
                'province_id' => 18,
                'municipality_name' => 'Don Carlos',
            ),
            272 => 
            array (
                'id' => 279,
                'province_id' => 18,
                'municipality_name' => 'Kadingilan',
            ),
            273 => 
            array (
                'id' => 280,
                'province_id' => 18,
                'municipality_name' => 'Kibawe',
            ),
            274 => 
            array (
                'id' => 281,
                'province_id' => 18,
                'municipality_name' => 'Lantapan',
            ),
            275 => 
            array (
                'id' => 282,
                'province_id' => 18,
                'municipality_name' => 'Malaybalay',
            ),
            276 => 
            array (
                'id' => 283,
                'province_id' => 18,
                'municipality_name' => 'Manolo Fortich',
            ),
            277 => 
            array (
                'id' => 284,
                'province_id' => 18,
                'municipality_name' => 'Pangantucan',
            ),
            278 => 
            array (
                'id' => 285,
                'province_id' => 18,
                'municipality_name' => 'San Fernando',
            ),
            279 => 
            array (
                'id' => 286,
                'province_id' => 18,
                'municipality_name' => 'Talakag',
            ),
            280 => 
            array (
                'id' => 287,
                'province_id' => 18,
                'municipality_name' => 'Cabanglasan',
            ),
            281 => 
            array (
                'id' => 288,
                'province_id' => 18,
                'municipality_name' => 'Dangcagan',
            ),
            282 => 
            array (
                'id' => 289,
                'province_id' => 18,
                'municipality_name' => 'Impasugong',
            ),
            283 => 
            array (
                'id' => 290,
                'province_id' => 18,
                'municipality_name' => 'Kalilangan',
            ),
            284 => 
            array (
                'id' => 291,
                'province_id' => 18,
                'municipality_name' => 'Kitaotao',
            ),
            285 => 
            array (
                'id' => 292,
                'province_id' => 18,
                'municipality_name' => 'Libona',
            ),
            286 => 
            array (
                'id' => 293,
                'province_id' => 18,
                'municipality_name' => 'Malitbog',
            ),
            287 => 
            array (
                'id' => 294,
                'province_id' => 18,
                'municipality_name' => 'Maramag',
            ),
            288 => 
            array (
                'id' => 295,
                'province_id' => 18,
                'municipality_name' => 'Quezon',
            ),
            289 => 
            array (
                'id' => 296,
                'province_id' => 18,
                'municipality_name' => 'Sumilao',
            ),
            290 => 
            array (
                'id' => 297,
                'province_id' => 18,
                'municipality_name' => 'Valencia',
            ),
            291 => 
            array (
                'id' => 322,
                'province_id' => 19,
                'municipality_name' => 'Angat',
            ),
            292 => 
            array (
                'id' => 323,
                'province_id' => 19,
                'municipality_name' => 'Baliuag',
            ),
            293 => 
            array (
                'id' => 324,
                'province_id' => 19,
                'municipality_name' => 'Bulakan',
            ),
            294 => 
            array (
                'id' => 325,
                'province_id' => 19,
                'municipality_name' => 'Calumpit',
            ),
            295 => 
            array (
                'id' => 326,
                'province_id' => 19,
                'municipality_name' => 'Guiguinto',
            ),
            296 => 
            array (
                'id' => 327,
                'province_id' => 19,
                'municipality_name' => 'Malolos',
            ),
            297 => 
            array (
                'id' => 328,
                'province_id' => 19,
                'municipality_name' => 'Meycauayan',
            ),
            298 => 
            array (
                'id' => 329,
                'province_id' => 19,
                'municipality_name' => 'Obando',
            ),
            299 => 
            array (
                'id' => 330,
                'province_id' => 19,
                'municipality_name' => 'Paombong',
            ),
            300 => 
            array (
                'id' => 331,
                'province_id' => 19,
                'municipality_name' => 'Pulilan',
            ),
            301 => 
            array (
                'id' => 332,
                'province_id' => 19,
                'municipality_name' => 'San Jose del Monte',
            ),
            302 => 
            array (
                'id' => 333,
                'province_id' => 19,
                'municipality_name' => 'San Rafael',
            ),
            303 => 
            array (
                'id' => 334,
                'province_id' => 19,
            'municipality_name' => 'Balagtas (Bigaa)',
            ),
            304 => 
            array (
                'id' => 335,
                'province_id' => 19,
                'municipality_name' => 'Bocaue',
            ),
            305 => 
            array (
                'id' => 336,
                'province_id' => 19,
                'municipality_name' => 'Bustos',
            ),
            306 => 
            array (
                'id' => 337,
                'province_id' => 19,
                'municipality_name' => 'Do&ntilde;a Remedios Trinidad',
            ),
            307 => 
            array (
                'id' => 338,
                'province_id' => 19,
                'municipality_name' => 'Hagonoy',
            ),
            308 => 
            array (
                'id' => 339,
                'province_id' => 19,
                'municipality_name' => 'Marilao',
            ),
            309 => 
            array (
                'id' => 340,
                'province_id' => 19,
                'municipality_name' => 'Norzagaray',
            ),
            310 => 
            array (
                'id' => 341,
                'province_id' => 19,
                'municipality_name' => 'Pandi',
            ),
            311 => 
            array (
                'id' => 342,
                'province_id' => 19,
                'municipality_name' => 'Plaridel',
            ),
            312 => 
            array (
                'id' => 343,
                'province_id' => 19,
                'municipality_name' => 'San Ildefonso',
            ),
            313 => 
            array (
                'id' => 344,
                'province_id' => 19,
                'municipality_name' => 'San Miguel',
            ),
            314 => 
            array (
                'id' => 345,
                'province_id' => 19,
                'municipality_name' => 'Santa Maria',
            ),
            315 => 
            array (
                'id' => 346,
                'province_id' => 20,
                'municipality_name' => 'Abulug',
            ),
            316 => 
            array (
                'id' => 347,
                'province_id' => 20,
                'municipality_name' => 'Allacapan',
            ),
            317 => 
            array (
                'id' => 348,
                'province_id' => 20,
                'municipality_name' => 'Aparri',
            ),
            318 => 
            array (
                'id' => 349,
                'province_id' => 20,
                'municipality_name' => 'Ballesteros',
            ),
            319 => 
            array (
                'id' => 350,
                'province_id' => 20,
                'municipality_name' => 'Calayan',
            ),
            320 => 
            array (
                'id' => 351,
                'province_id' => 20,
                'municipality_name' => 'Claveria',
            ),
            321 => 
            array (
                'id' => 352,
                'province_id' => 20,
                'municipality_name' => 'Gattaran',
            ),
            322 => 
            array (
                'id' => 353,
                'province_id' => 20,
                'municipality_name' => 'Iguig',
            ),
            323 => 
            array (
                'id' => 354,
                'province_id' => 20,
                'municipality_name' => 'Lasam',
            ),
            324 => 
            array (
                'id' => 355,
                'province_id' => 20,
                'municipality_name' => 'Pe&ntilde;ablanca',
            ),
            325 => 
            array (
                'id' => 356,
                'province_id' => 20,
                'municipality_name' => 'Rizal',
            ),
            326 => 
            array (
                'id' => 357,
                'province_id' => 20,
                'municipality_name' => 'Santa Ana',
            ),
            327 => 
            array (
                'id' => 358,
                'province_id' => 20,
                'municipality_name' => 'Santa Teresita',
            ),
            328 => 
            array (
                'id' => 359,
                'province_id' => 20,
                'municipality_name' => 'Solana',
            ),
            329 => 
            array (
                'id' => 360,
                'province_id' => 20,
                'municipality_name' => 'Tuguegarao',
            ),
            330 => 
            array (
                'id' => 361,
                'province_id' => 20,
                'municipality_name' => 'Alcala',
            ),
            331 => 
            array (
                'id' => 362,
                'province_id' => 20,
                'municipality_name' => 'Amulung',
            ),
            332 => 
            array (
                'id' => 363,
                'province_id' => 20,
                'municipality_name' => 'Baggao',
            ),
            333 => 
            array (
                'id' => 364,
                'province_id' => 20,
                'municipality_name' => 'Buguey',
            ),
            334 => 
            array (
                'id' => 365,
                'province_id' => 20,
                'municipality_name' => 'Camalaniugan',
            ),
            335 => 
            array (
                'id' => 366,
                'province_id' => 20,
                'municipality_name' => 'Enrile',
            ),
            336 => 
            array (
                'id' => 367,
                'province_id' => 20,
                'municipality_name' => 'Gonzaga',
            ),
            337 => 
            array (
                'id' => 368,
                'province_id' => 20,
                'municipality_name' => 'Lal-lo',
            ),
            338 => 
            array (
                'id' => 369,
                'province_id' => 20,
                'municipality_name' => 'Pamplona',
            ),
            339 => 
            array (
                'id' => 370,
                'province_id' => 20,
                'municipality_name' => 'Piat',
            ),
            340 => 
            array (
                'id' => 371,
                'province_id' => 20,
                'municipality_name' => 'Sanchez-Mira',
            ),
            341 => 
            array (
                'id' => 372,
                'province_id' => 20,
                'municipality_name' => 'Santa Praxedes',
            ),
            342 => 
            array (
                'id' => 373,
                'province_id' => 20,
            'municipality_name' => 'Santo Ni&ntilde;o (Faire)',
            ),
            343 => 
            array (
                'id' => 374,
                'province_id' => 20,
                'municipality_name' => 'Tuao',
            ),
            344 => 
            array (
                'id' => 375,
                'province_id' => 21,
                'municipality_name' => 'Basud',
            ),
            345 => 
            array (
                'id' => 376,
                'province_id' => 21,
                'municipality_name' => 'Daet',
            ),
            346 => 
            array (
                'id' => 377,
                'province_id' => 21,
                'municipality_name' => 'Labo',
            ),
            347 => 
            array (
                'id' => 378,
                'province_id' => 21,
                'municipality_name' => 'Paracale',
            ),
            348 => 
            array (
                'id' => 379,
                'province_id' => 21,
                'municipality_name' => 'San Vicente',
            ),
            349 => 
            array (
                'id' => 380,
                'province_id' => 21,
                'municipality_name' => 'Talisay',
            ),
            350 => 
            array (
                'id' => 381,
                'province_id' => 21,
                'municipality_name' => 'Capalonga',
            ),
            351 => 
            array (
                'id' => 382,
                'province_id' => 21,
                'municipality_name' => 'Jose Panganiban',
            ),
            352 => 
            array (
                'id' => 383,
                'province_id' => 21,
                'municipality_name' => 'Mercedes',
            ),
            353 => 
            array (
                'id' => 384,
                'province_id' => 21,
            'municipality_name' => 'San Lorenzo Ruiz (Imelda)',
            ),
            354 => 
            array (
                'id' => 385,
                'province_id' => 21,
                'municipality_name' => 'Santa Elena',
            ),
            355 => 
            array (
                'id' => 386,
                'province_id' => 21,
                'municipality_name' => 'Vinzons',
            ),
            356 => 
            array (
                'id' => 387,
                'province_id' => 22,
                'municipality_name' => 'Baao',
            ),
            357 => 
            array (
                'id' => 388,
                'province_id' => 22,
                'municipality_name' => 'Bato',
            ),
            358 => 
            array (
                'id' => 389,
                'province_id' => 22,
                'municipality_name' => 'Buhi',
            ),
            359 => 
            array (
                'id' => 390,
                'province_id' => 22,
                'municipality_name' => 'Cabusao',
            ),
            360 => 
            array (
                'id' => 391,
                'province_id' => 22,
                'municipality_name' => 'Camaligan',
            ),
            361 => 
            array (
                'id' => 392,
                'province_id' => 22,
                'municipality_name' => 'Caramoan',
            ),
            362 => 
            array (
                'id' => 393,
                'province_id' => 22,
                'municipality_name' => 'Gainza',
            ),
            363 => 
            array (
                'id' => 394,
                'province_id' => 22,
                'municipality_name' => 'Goa',
            ),
            364 => 
            array (
                'id' => 395,
                'province_id' => 22,
                'municipality_name' => 'Lagonoy',
            ),
            365 => 
            array (
                'id' => 396,
                'province_id' => 22,
                'municipality_name' => 'Lupi',
            ),
            366 => 
            array (
                'id' => 397,
                'province_id' => 22,
                'municipality_name' => 'Milaor',
            ),
            367 => 
            array (
                'id' => 398,
                'province_id' => 22,
                'municipality_name' => 'Nabua',
            ),
            368 => 
            array (
                'id' => 399,
                'province_id' => 22,
                'municipality_name' => 'Ocampo',
            ),
            369 => 
            array (
                'id' => 400,
                'province_id' => 22,
                'municipality_name' => 'Pasacao',
            ),
            370 => 
            array (
                'id' => 401,
                'province_id' => 22,
                'municipality_name' => 'Presentaci&oacute;n (Parubcan',
                ),
                371 => 
                array (
                    'id' => 402,
                    'province_id' => 22,
                    'municipality_name' => 'Sag&ntilde;ay',
                ),
                372 => 
                array (
                    'id' => 403,
                    'province_id' => 22,
                    'municipality_name' => 'San Jose',
                ),
                373 => 
                array (
                    'id' => 404,
                    'province_id' => 22,
                    'municipality_name' => 'Siruma',
                ),
                374 => 
                array (
                    'id' => 405,
                    'province_id' => 22,
                    'municipality_name' => 'Tinambac',
                ),
                375 => 
                array (
                    'id' => 406,
                    'province_id' => 22,
                    'municipality_name' => 'Balatan',
                ),
                376 => 
                array (
                    'id' => 407,
                    'province_id' => 22,
                    'municipality_name' => 'Bombon',
                ),
                377 => 
                array (
                    'id' => 408,
                    'province_id' => 22,
                    'municipality_name' => 'Bula',
                ),
                378 => 
                array (
                    'id' => 409,
                    'province_id' => 22,
                    'municipality_name' => 'Calabanga',
                ),
                379 => 
                array (
                    'id' => 410,
                    'province_id' => 22,
                    'municipality_name' => 'Canaman',
                ),
                380 => 
                array (
                    'id' => 411,
                    'province_id' => 22,
                    'municipality_name' => 'Del Gallego',
                ),
                381 => 
                array (
                    'id' => 412,
                    'province_id' => 22,
                    'municipality_name' => 'Garchitorena',
                ),
                382 => 
                array (
                    'id' => 413,
                    'province_id' => 22,
                    'municipality_name' => 'Iriga',
                ),
                383 => 
                array (
                    'id' => 414,
                    'province_id' => 22,
                    'municipality_name' => 'Libmanan',
                ),
                384 => 
                array (
                    'id' => 415,
                    'province_id' => 22,
                    'municipality_name' => 'Magarao',
                ),
                385 => 
                array (
                    'id' => 416,
                    'province_id' => 22,
                    'municipality_name' => 'Minalabac',
                ),
                386 => 
                array (
                    'id' => 417,
                    'province_id' => 22,
                    'municipality_name' => 'Naga',
                ),
                387 => 
                array (
                    'id' => 418,
                    'province_id' => 22,
                    'municipality_name' => 'Pamplona',
                ),
                388 => 
                array (
                    'id' => 419,
                    'province_id' => 22,
                    'municipality_name' => 'Pili',
                ),
                389 => 
                array (
                    'id' => 420,
                    'province_id' => 22,
                    'municipality_name' => 'Ragay',
                ),
                390 => 
                array (
                    'id' => 421,
                    'province_id' => 22,
                    'municipality_name' => 'San Fernando',
                ),
                391 => 
                array (
                    'id' => 422,
                    'province_id' => 22,
                    'municipality_name' => 'Sipocot',
                ),
                392 => 
                array (
                    'id' => 423,
                    'province_id' => 22,
                    'municipality_name' => 'Tigaon',
                ),
                393 => 
                array (
                    'id' => 424,
                    'province_id' => 23,
                    'municipality_name' => 'Catarman',
                ),
                394 => 
                array (
                    'id' => 425,
                    'province_id' => 23,
                    'municipality_name' => 'Mahinog',
                ),
                395 => 
                array (
                    'id' => 426,
                    'province_id' => 23,
                    'municipality_name' => 'Sagay',
                ),
                396 => 
                array (
                    'id' => 427,
                    'province_id' => 23,
                    'municipality_name' => 'Guinsiliban',
                ),
                397 => 
                array (
                    'id' => 428,
                    'province_id' => 23,
                    'municipality_name' => 'Mambajao',
                ),
                398 => 
                array (
                    'id' => 429,
                    'province_id' => 24,
                    'municipality_name' => 'Cuartero',
                ),
                399 => 
                array (
                    'id' => 430,
                    'province_id' => 24,
                    'municipality_name' => 'Dumalag',
                ),
                400 => 
                array (
                    'id' => 431,
                    'province_id' => 24,
                    'municipality_name' => 'Ivisan',
                ),
                401 => 
                array (
                    'id' => 432,
                    'province_id' => 24,
                    'municipality_name' => 'Ma-ayon',
                ),
                402 => 
                array (
                    'id' => 433,
                    'province_id' => 24,
                    'municipality_name' => 'Panay',
                ),
                403 => 
                array (
                    'id' => 434,
                    'province_id' => 24,
                    'municipality_name' => 'Pilar',
                ),
                404 => 
                array (
                    'id' => 435,
                    'province_id' => 24,
                    'municipality_name' => 'President Roxas',
                ),
                405 => 
                array (
                    'id' => 436,
                    'province_id' => 24,
                    'municipality_name' => 'Sapian',
                ),
                406 => 
                array (
                    'id' => 437,
                    'province_id' => 24,
                    'municipality_name' => 'Tapaz',
                ),
                407 => 
                array (
                    'id' => 438,
                    'province_id' => 24,
                    'municipality_name' => 'Dao',
                ),
                408 => 
                array (
                    'id' => 439,
                    'province_id' => 24,
                    'municipality_name' => 'Dumarao',
                ),
                409 => 
                array (
                    'id' => 440,
                    'province_id' => 24,
                    'municipality_name' => 'Jamindan',
                ),
                410 => 
                array (
                    'id' => 441,
                    'province_id' => 24,
                    'municipality_name' => 'Mambusao',
                ),
                411 => 
                array (
                    'id' => 442,
                    'province_id' => 24,
                    'municipality_name' => 'Panitan',
                ),
                412 => 
                array (
                    'id' => 443,
                    'province_id' => 24,
                    'municipality_name' => 'Pontevedra',
                ),
                413 => 
                array (
                    'id' => 444,
                    'province_id' => 24,
                    'municipality_name' => 'Roxas City',
                ),
                414 => 
                array (
                    'id' => 445,
                    'province_id' => 24,
                    'municipality_name' => 'Sigma',
                ),
                415 => 
                array (
                    'id' => 446,
                    'province_id' => 25,
                    'municipality_name' => 'Bagamanoc',
                ),
                416 => 
                array (
                    'id' => 447,
                    'province_id' => 25,
                    'municipality_name' => 'Bato',
                ),
                417 => 
                array (
                    'id' => 448,
                    'province_id' => 25,
                    'municipality_name' => 'Gigmoto',
                ),
                418 => 
                array (
                    'id' => 449,
                    'province_id' => 25,
                'municipality_name' => 'Panganiban (Payo)',
                ),
                419 => 
                array (
                    'id' => 450,
                    'province_id' => 25,
                    'municipality_name' => 'San Miguel',
                ),
                420 => 
                array (
                    'id' => 451,
                    'province_id' => 25,
                    'municipality_name' => 'Virac',
                ),
                421 => 
                array (
                    'id' => 452,
                    'province_id' => 25,
                    'municipality_name' => 'Baras',
                ),
                422 => 
                array (
                    'id' => 453,
                    'province_id' => 25,
                    'municipality_name' => 'Caramoran',
                ),
                423 => 
                array (
                    'id' => 454,
                    'province_id' => 25,
                    'municipality_name' => 'Pandan',
                ),
                424 => 
                array (
                    'id' => 455,
                    'province_id' => 25,
                'municipality_name' => 'San Andres (Calolbon)',
                ),
                425 => 
                array (
                    'id' => 456,
                    'province_id' => 25,
                    'municipality_name' => 'Viga',
                ),
                426 => 
                array (
                    'id' => 457,
                    'province_id' => 26,
                    'municipality_name' => 'Alfonso',
                ),
                427 => 
                array (
                    'id' => 458,
                    'province_id' => 26,
                    'municipality_name' => 'Bacoor',
                ),
                428 => 
                array (
                    'id' => 459,
                    'province_id' => 26,
                    'municipality_name' => 'Cavite City',
                ),
                429 => 
                array (
                    'id' => 460,
                    'province_id' => 26,
                    'municipality_name' => 'General Emilio Aguinaldo',
                ),
                430 => 
                array (
                    'id' => 461,
                    'province_id' => 26,
                    'municipality_name' => 'General Trias',
                ),
                431 => 
                array (
                    'id' => 462,
                    'province_id' => 26,
                    'municipality_name' => 'Indang',
                ),
                432 => 
                array (
                    'id' => 463,
                    'province_id' => 26,
                    'municipality_name' => 'Magallanes',
                ),
                433 => 
                array (
                    'id' => 464,
                    'province_id' => 26,
                'municipality_name' => 'Mendez (Mendez-Nu&ntilde;ez)',
                ),
                434 => 
                array (
                    'id' => 465,
                    'province_id' => 26,
                    'municipality_name' => 'Noveleta',
                ),
                435 => 
                array (
                    'id' => 466,
                    'province_id' => 26,
                    'municipality_name' => 'Silang',
                ),
                436 => 
                array (
                    'id' => 467,
                    'province_id' => 26,
                    'municipality_name' => 'Tanza',
                ),
                437 => 
                array (
                    'id' => 468,
                    'province_id' => 26,
                    'municipality_name' => 'Trece Martires',
                ),
                438 => 
                array (
                    'id' => 469,
                    'province_id' => 26,
                    'municipality_name' => 'Amadeo',
                ),
                439 => 
                array (
                    'id' => 470,
                    'province_id' => 26,
                    'municipality_name' => 'Carmona',
                ),
                440 => 
                array (
                    'id' => 471,
                    'province_id' => 26,
                    'municipality_name' => 'Dasmari&ntilde;as',
                ),
                441 => 
                array (
                    'id' => 472,
                    'province_id' => 26,
                    'municipality_name' => 'General Mariano Alvarez',
                ),
                442 => 
                array (
                    'id' => 473,
                    'province_id' => 26,
                    'municipality_name' => 'Imus',
                ),
                443 => 
                array (
                    'id' => 474,
                    'province_id' => 26,
                    'municipality_name' => 'Kawit',
                ),
                444 => 
                array (
                    'id' => 475,
                    'province_id' => 26,
                    'municipality_name' => 'Maragondon',
                ),
                445 => 
                array (
                    'id' => 476,
                    'province_id' => 26,
                    'municipality_name' => 'Naic',
                ),
                446 => 
                array (
                    'id' => 477,
                    'province_id' => 26,
                    'municipality_name' => 'Rosario',
                ),
                447 => 
                array (
                    'id' => 478,
                    'province_id' => 26,
                    'municipality_name' => 'Tagaytay',
                ),
                448 => 
                array (
                    'id' => 479,
                    'province_id' => 26,
                    'municipality_name' => 'Ternate',
                ),
                449 => 
                array (
                    'id' => 480,
                    'province_id' => 27,
                    'municipality_name' => 'Alcantara',
                ),
                450 => 
                array (
                    'id' => 481,
                    'province_id' => 27,
                    'municipality_name' => 'Alegria',
                ),
                451 => 
                array (
                    'id' => 482,
                    'province_id' => 27,
                    'municipality_name' => 'Argao',
                ),
                452 => 
                array (
                    'id' => 483,
                    'province_id' => 27,
                    'municipality_name' => 'Badian',
                ),
                453 => 
                array (
                    'id' => 484,
                    'province_id' => 27,
                    'municipality_name' => 'Bantayan',
                ),
                454 => 
                array (
                    'id' => 485,
                    'province_id' => 27,
                    'municipality_name' => 'Bogo',
                ),
                455 => 
                array (
                    'id' => 486,
                    'province_id' => 27,
                    'municipality_name' => 'Borbon',
                ),
                456 => 
                array (
                    'id' => 487,
                    'province_id' => 27,
                    'municipality_name' => 'Carmen',
                ),
                457 => 
                array (
                    'id' => 488,
                    'province_id' => 27,
                    'municipality_name' => 'Cebu City',
                ),
                458 => 
                array (
                    'id' => 489,
                    'province_id' => 27,
                    'municipality_name' => 'Consolacion',
                ),
                459 => 
                array (
                    'id' => 490,
                    'province_id' => 27,
                    'municipality_name' => 'Daanbantayan',
                ),
                460 => 
                array (
                    'id' => 491,
                    'province_id' => 27,
                    'municipality_name' => 'Danao',
                ),
                461 => 
                array (
                    'id' => 492,
                    'province_id' => 27,
                    'municipality_name' => 'Ginatilan',
                ),
                462 => 
                array (
                    'id' => 493,
                    'province_id' => 27,
                    'municipality_name' => 'Liloan',
                ),
                463 => 
                array (
                    'id' => 494,
                    'province_id' => 27,
                    'municipality_name' => 'Malabuyoc',
                ),
                464 => 
                array (
                    'id' => 495,
                    'province_id' => 27,
                    'municipality_name' => 'Medellin',
                ),
                465 => 
                array (
                    'id' => 496,
                    'province_id' => 27,
                    'municipality_name' => 'Moalboal',
                ),
                466 => 
                array (
                    'id' => 497,
                    'province_id' => 27,
                    'municipality_name' => 'Oslob',
                ),
                467 => 
                array (
                    'id' => 498,
                    'province_id' => 27,
                    'municipality_name' => 'Pinamungajan',
                ),
                468 => 
                array (
                    'id' => 499,
                    'province_id' => 27,
                    'municipality_name' => 'Ronda',
                ),
                469 => 
                array (
                    'id' => 500,
                    'province_id' => 27,
                    'municipality_name' => 'San Fernando',
                ),
                470 => 
                array (
                    'id' => 501,
                    'province_id' => 27,
                    'municipality_name' => 'San Remigio',
                ),
                471 => 
                array (
                    'id' => 502,
                    'province_id' => 27,
                    'municipality_name' => 'Santander',
                ),
                472 => 
                array (
                    'id' => 503,
                    'province_id' => 27,
                    'municipality_name' => 'Sogod',
                ),
                473 => 
                array (
                    'id' => 504,
                    'province_id' => 27,
                    'municipality_name' => 'Tabuelan',
                ),
                474 => 
                array (
                    'id' => 505,
                    'province_id' => 27,
                    'municipality_name' => 'Toledo',
                ),
                475 => 
                array (
                    'id' => 506,
                    'province_id' => 27,
                    'municipality_name' => 'Tudela',
                ),
                476 => 
                array (
                    'id' => 507,
                    'province_id' => 27,
                    'municipality_name' => 'Alcoy',
                ),
                477 => 
                array (
                    'id' => 508,
                    'province_id' => 27,
                    'municipality_name' => 'Aloguinsan',
                ),
                478 => 
                array (
                    'id' => 509,
                    'province_id' => 27,
                    'municipality_name' => 'Asturias',
                ),
                479 => 
                array (
                    'id' => 510,
                    'province_id' => 27,
                    'municipality_name' => 'Balamban',
                ),
                480 => 
                array (
                    'id' => 511,
                    'province_id' => 27,
                    'municipality_name' => 'Barili',
                ),
                481 => 
                array (
                    'id' => 512,
                    'province_id' => 27,
                    'municipality_name' => 'Boljoon',
                ),
                482 => 
                array (
                    'id' => 513,
                    'province_id' => 27,
                    'municipality_name' => 'Carcar',
                ),
                483 => 
                array (
                    'id' => 514,
                    'province_id' => 27,
                    'municipality_name' => 'Catmon',
                ),
                484 => 
                array (
                    'id' => 515,
                    'province_id' => 27,
                    'municipality_name' => 'Compostela',
                ),
                485 => 
                array (
                    'id' => 516,
                    'province_id' => 27,
                    'municipality_name' => 'Cordova',
                ),
                486 => 
                array (
                    'id' => 517,
                    'province_id' => 27,
                    'municipality_name' => 'Dalaguete',
                ),
                487 => 
                array (
                    'id' => 518,
                    'province_id' => 27,
                    'municipality_name' => 'Dumanjug',
                ),
                488 => 
                array (
                    'id' => 519,
                    'province_id' => 27,
                'municipality_name' => 'Lapu-Lapu (Opon)',
                ),
                489 => 
                array (
                    'id' => 520,
                    'province_id' => 27,
                    'municipality_name' => 'Madridejos',
                ),
                490 => 
                array (
                    'id' => 521,
                    'province_id' => 27,
                    'municipality_name' => 'Mandaue',
                ),
                491 => 
                array (
                    'id' => 522,
                    'province_id' => 27,
                    'municipality_name' => 'Minglanilla',
                ),
                492 => 
                array (
                    'id' => 523,
                    'province_id' => 27,
                    'municipality_name' => 'Naga',
                ),
                493 => 
                array (
                    'id' => 524,
                    'province_id' => 24,
                    'municipality_name' => 'Pilar',
                ),
                494 => 
                array (
                    'id' => 525,
                    'province_id' => 27,
                    'municipality_name' => 'Poro',
                ),
                495 => 
                array (
                    'id' => 526,
                    'province_id' => 27,
                    'municipality_name' => 'Samboan',
                ),
                496 => 
                array (
                    'id' => 527,
                    'province_id' => 27,
                    'municipality_name' => 'San Francisco',
                ),
                497 => 
                array (
                    'id' => 528,
                    'province_id' => 27,
                    'municipality_name' => 'Santa Fe',
                ),
                498 => 
                array (
                    'id' => 529,
                    'province_id' => 27,
                    'municipality_name' => 'Sibonga',
                ),
                499 => 
                array (
                    'id' => 530,
                    'province_id' => 27,
                    'municipality_name' => 'Tabogon',
                ),
            ));
        \DB::table('municipality')->insert(array (
            0 => 
            array (
                'id' => 531,
                'province_id' => 27,
                'municipality_name' => 'Talisay',
            ),
            1 => 
            array (
                'id' => 532,
                'province_id' => 27,
                'municipality_name' => 'Tuburan',
            ),
            2 => 
            array (
                'id' => 533,
                'province_id' => 28,
                'municipality_name' => 'Alamada',
            ),
            3 => 
            array (
                'id' => 534,
                'province_id' => 28,
                'municipality_name' => 'Antipas',
            ),
            4 => 
            array (
                'id' => 535,
                'province_id' => 28,
                'municipality_name' => 'Banisilan',
            ),
            5 => 
            array (
                'id' => 536,
                'province_id' => 28,
                'municipality_name' => 'Kabacan',
            ),
            6 => 
            array (
                'id' => 537,
                'province_id' => 28,
                'municipality_name' => 'Libungan',
            ),
            7 => 
            array (
                'id' => 538,
                'province_id' => 28,
                'municipality_name' => 'Magpet',
            ),
            8 => 
            array (
                'id' => 539,
                'province_id' => 28,
                'municipality_name' => 'Matalam',
            ),
            9 => 
            array (
                'id' => 540,
                'province_id' => 28,
                'municipality_name' => 'Pigcawayan',
            ),
            10 => 
            array (
                'id' => 541,
                'province_id' => 28,
                'municipality_name' => 'President Roxas',
            ),
            11 => 
            array (
                'id' => 542,
                'province_id' => 28,
                'municipality_name' => 'Aleosan',
            ),
            12 => 
            array (
                'id' => 543,
                'province_id' => 28,
                'municipality_name' => 'Arakan',
            ),
            13 => 
            array (
                'id' => 544,
                'province_id' => 28,
                'municipality_name' => 'Carmen',
            ),
            14 => 
            array (
                'id' => 545,
                'province_id' => 28,
                'municipality_name' => 'Kidapawan',
            ),
            15 => 
            array (
                'id' => 546,
                'province_id' => 28,
                'municipality_name' => 'M\'lang',
            ),
            16 => 
            array (
                'id' => 547,
                'province_id' => 28,
                'municipality_name' => 'Makilala',
            ),
            17 => 
            array (
                'id' => 548,
                'province_id' => 28,
                'municipality_name' => 'Midsayap',
            ),
            18 => 
            array (
                'id' => 549,
                'province_id' => 28,
                'municipality_name' => 'Pikit',
            ),
            19 => 
            array (
                'id' => 550,
                'province_id' => 28,
                'municipality_name' => 'Tulunan',
            ),
            20 => 
            array (
                'id' => 551,
                'province_id' => 29,
                'municipality_name' => 'New Bataan',
            ),
            21 => 
            array (
                'id' => 552,
                'province_id' => 29,
                'municipality_name' => 'Compostela',
            ),
            22 => 
            array (
                'id' => 553,
                'province_id' => 29,
            'municipality_name' => 'Mabini (Do&ntilde;a Alicia)',
            ),
            23 => 
            array (
                'id' => 554,
                'province_id' => 29,
            'municipality_name' => 'Maragusan (San Mariano)',
            ),
            24 => 
            array (
                'id' => 555,
                'province_id' => 29,
                'municipality_name' => 'Monkayo',
            ),
            25 => 
            array (
                'id' => 556,
                'province_id' => 29,
                'municipality_name' => 'Nabunturan',
            ),
            26 => 
            array (
                'id' => 557,
                'province_id' => 29,
                'municipality_name' => 'Pantukan',
            ),
            27 => 
            array (
                'id' => 558,
                'province_id' => 29,
            'municipality_name' => 'Laak (San Vicente)',
            ),
            28 => 
            array (
                'id' => 559,
                'province_id' => 29,
                'municipality_name' => 'Maco',
            ),
            29 => 
            array (
                'id' => 560,
                'province_id' => 29,
                'municipality_name' => 'Mawab',
            ),
            30 => 
            array (
                'id' => 561,
                'province_id' => 29,
                'municipality_name' => 'Montevista',
            ),
            31 => 
            array (
                'id' => 562,
                'province_id' => 30,
            'municipality_name' => 'Asuncion (Saug)',
            ),
            32 => 
            array (
                'id' => 563,
                'province_id' => 30,
                'municipality_name' => 'Carmen',
            ),
            33 => 
            array (
                'id' => 564,
                'province_id' => 30,
                'municipality_name' => 'New Corella',
            ),
            34 => 
            array (
                'id' => 565,
                'province_id' => 30,
                'municipality_name' => 'Samal',
            ),
            35 => 
            array (
                'id' => 566,
                'province_id' => 30,
                'municipality_name' => 'Santo Tomas',
            ),
            36 => 
            array (
                'id' => 567,
                'province_id' => 30,
                'municipality_name' => 'Talaingod',
            ),
            37 => 
            array (
                'id' => 568,
                'province_id' => 30,
                'municipality_name' => 'Braulio E. Dujali',
            ),
            38 => 
            array (
                'id' => 569,
                'province_id' => 30,
                'municipality_name' => 'Kapalong',
            ),
            39 => 
            array (
                'id' => 570,
                'province_id' => 30,
                'municipality_name' => 'Panabo',
            ),
            40 => 
            array (
                'id' => 571,
                'province_id' => 30,
                'municipality_name' => 'San Isidro',
            ),
            41 => 
            array (
                'id' => 572,
                'province_id' => 30,
                'municipality_name' => 'Tagum',
            ),
            42 => 
            array (
                'id' => 573,
                'province_id' => 31,
                'municipality_name' => 'Santa Cruz',
            ),
            43 => 
            array (
                'id' => 574,
                'province_id' => 31,
                'municipality_name' => 'Bansalan',
            ),
            44 => 
            array (
                'id' => 575,
                'province_id' => 31,
                'municipality_name' => 'Digos',
            ),
            45 => 
            array (
                'id' => 576,
                'province_id' => 31,
                'municipality_name' => 'Kiblawan',
            ),
            46 => 
            array (
                'id' => 577,
                'province_id' => 31,
                'municipality_name' => 'Malalag',
            ),
            47 => 
            array (
                'id' => 578,
                'province_id' => 31,
                'municipality_name' => 'Padada',
            ),
            48 => 
            array (
                'id' => 579,
                'province_id' => 31,
                'municipality_name' => 'Sulop',
            ),
            49 => 
            array (
                'id' => 580,
                'province_id' => 31,
                'municipality_name' => 'Davao City',
            ),
            50 => 
            array (
                'id' => 581,
                'province_id' => 31,
                'municipality_name' => 'Hagonoy',
            ),
            51 => 
            array (
                'id' => 582,
                'province_id' => 31,
                'municipality_name' => 'Magsaysay',
            ),
            52 => 
            array (
                'id' => 583,
                'province_id' => 31,
                'municipality_name' => 'Matanao',
            ),
            53 => 
            array (
                'id' => 584,
                'province_id' => 32,
                'municipality_name' => 'Don Marcelino',
            ),
            54 => 
            array (
                'id' => 585,
                'province_id' => 32,
                'municipality_name' => 'Malita',
            ),
            55 => 
            array (
                'id' => 586,
                'province_id' => 32,
                'municipality_name' => 'Sarangani',
            ),
            56 => 
            array (
                'id' => 587,
                'province_id' => 32,
            'municipality_name' => 'Jose Abad Santos (Trinidad)',
            ),
            57 => 
            array (
                'id' => 588,
                'province_id' => 32,
                'municipality_name' => 'Santa Maria',
            ),
            58 => 
            array (
                'id' => 589,
                'province_id' => 33,
                'municipality_name' => 'Baganga',
            ),
            59 => 
            array (
                'id' => 590,
                'province_id' => 33,
                'municipality_name' => 'Boston',
            ),
            60 => 
            array (
                'id' => 591,
                'province_id' => 33,
                'municipality_name' => 'Cateel',
            ),
            61 => 
            array (
                'id' => 592,
                'province_id' => 33,
                'municipality_name' => 'Lupon',
            ),
            62 => 
            array (
                'id' => 593,
                'province_id' => 33,
                'municipality_name' => 'Mati',
            ),
            63 => 
            array (
                'id' => 594,
                'province_id' => 33,
                'municipality_name' => 'Tarragona',
            ),
            64 => 
            array (
                'id' => 595,
                'province_id' => 33,
                'municipality_name' => 'Banaybanay',
            ),
            65 => 
            array (
                'id' => 596,
                'province_id' => 33,
                'municipality_name' => 'Caraga',
            ),
            66 => 
            array (
                'id' => 597,
                'province_id' => 33,
                'municipality_name' => 'Governor Generoso',
            ),
            67 => 
            array (
                'id' => 598,
                'province_id' => 33,
                'municipality_name' => 'Manay',
            ),
            68 => 
            array (
                'id' => 599,
                'province_id' => 33,
                'municipality_name' => 'San Isidro',
            ),
            69 => 
            array (
                'id' => 600,
                'province_id' => 34,
            'municipality_name' => 'Basilisa (Rizal)',
            ),
            70 => 
            array (
                'id' => 601,
                'province_id' => 34,
                'municipality_name' => 'Dinagat',
            ),
            71 => 
            array (
                'id' => 602,
                'province_id' => 34,
                'municipality_name' => 'Loreto',
            ),
            72 => 
            array (
                'id' => 603,
                'province_id' => 34,
                'municipality_name' => 'Tubajon',
            ),
            73 => 
            array (
                'id' => 604,
                'province_id' => 34,
                'municipality_name' => 'Cagdianao',
            ),
            74 => 
            array (
                'id' => 605,
                'province_id' => 34,
            'municipality_name' => 'Libjo (Albor)',
            ),
            75 => 
            array (
                'id' => 606,
                'province_id' => 34,
                'municipality_name' => 'San Jose',
            ),
            76 => 
            array (
                'id' => 607,
                'province_id' => 35,
                'municipality_name' => 'Arteche',
            ),
            77 => 
            array (
                'id' => 608,
                'province_id' => 35,
                'municipality_name' => 'Balangkayan',
            ),
            78 => 
            array (
                'id' => 609,
                'province_id' => 35,
                'municipality_name' => 'Can-avid',
            ),
            79 => 
            array (
                'id' => 610,
                'province_id' => 35,
                'municipality_name' => 'General MacArthur',
            ),
            80 => 
            array (
                'id' => 611,
                'province_id' => 35,
                'municipality_name' => 'Guiuan',
            ),
            81 => 
            array (
                'id' => 612,
                'province_id' => 35,
                'municipality_name' => 'Jipapad',
            ),
            82 => 
            array (
                'id' => 613,
                'province_id' => 35,
                'municipality_name' => 'Llorente',
            ),
            83 => 
            array (
                'id' => 614,
                'province_id' => 35,
                'municipality_name' => 'Maydolong',
            ),
            84 => 
            array (
                'id' => 615,
                'province_id' => 35,
                'municipality_name' => 'Oras',
            ),
            85 => 
            array (
                'id' => 616,
                'province_id' => 35,
                'municipality_name' => 'Salcedo',
            ),
            86 => 
            array (
                'id' => 617,
                'province_id' => 35,
                'municipality_name' => 'San Policarpo',
            ),
            87 => 
            array (
                'id' => 618,
                'province_id' => 35,
                'municipality_name' => 'Taft',
            ),
            88 => 
            array (
                'id' => 619,
                'province_id' => 35,
                'municipality_name' => 'Balangiga',
            ),
            89 => 
            array (
                'id' => 620,
                'province_id' => 35,
                'municipality_name' => 'Borongan',
            ),
            90 => 
            array (
                'id' => 621,
                'province_id' => 35,
                'municipality_name' => 'Dolores',
            ),
            91 => 
            array (
                'id' => 622,
                'province_id' => 35,
                'municipality_name' => 'Giporlos',
            ),
            92 => 
            array (
                'id' => 623,
                'province_id' => 35,
                'municipality_name' => 'Hernani',
            ),
            93 => 
            array (
                'id' => 624,
                'province_id' => 35,
                'municipality_name' => 'Lawaan',
            ),
            94 => 
            array (
                'id' => 625,
                'province_id' => 35,
                'municipality_name' => 'Maslog',
            ),
            95 => 
            array (
                'id' => 626,
                'province_id' => 35,
                'municipality_name' => 'Mercedes',
            ),
            96 => 
            array (
                'id' => 627,
                'province_id' => 35,
                'municipality_name' => 'Quinapondan',
            ),
            97 => 
            array (
                'id' => 628,
                'province_id' => 35,
                'municipality_name' => 'San Julian',
            ),
            98 => 
            array (
                'id' => 629,
                'province_id' => 35,
                'municipality_name' => 'Sulat',
            ),
            99 => 
            array (
                'id' => 630,
                'province_id' => 36,
                'municipality_name' => 'Buenavista',
            ),
            100 => 
            array (
                'id' => 631,
                'province_id' => 36,
                'municipality_name' => 'Nueva Valencia',
            ),
            101 => 
            array (
                'id' => 632,
                'province_id' => 36,
                'municipality_name' => 'Sibunag',
            ),
            102 => 
            array (
                'id' => 633,
                'province_id' => 36,
                'municipality_name' => 'Jordan',
            ),
            103 => 
            array (
                'id' => 634,
                'province_id' => 36,
                'municipality_name' => 'San Lorenzo',
            ),
            104 => 
            array (
                'id' => 635,
                'province_id' => 37,
                'municipality_name' => 'Aguinaldo',
            ),
            105 => 
            array (
                'id' => 636,
                'province_id' => 37,
                'municipality_name' => 'Asipulo',
            ),
            106 => 
            array (
                'id' => 637,
                'province_id' => 37,
                'municipality_name' => 'Hingyon',
            ),
            107 => 
            array (
                'id' => 638,
                'province_id' => 37,
                'municipality_name' => 'Kiangan',
            ),
            108 => 
            array (
                'id' => 639,
                'province_id' => 37,
                'municipality_name' => 'Lamut',
            ),
            109 => 
            array (
                'id' => 640,
                'province_id' => 37,
                'municipality_name' => 'Tinoc',
            ),
            110 => 
            array (
                'id' => 641,
                'province_id' => 37,
            'municipality_name' => 'Alfonso Lista (Potia)',
            ),
            111 => 
            array (
                'id' => 642,
                'province_id' => 37,
                'municipality_name' => 'Banaue',
            ),
            112 => 
            array (
                'id' => 643,
                'province_id' => 37,
                'municipality_name' => 'Hungduan',
            ),
            113 => 
            array (
                'id' => 644,
                'province_id' => 37,
                'municipality_name' => 'Lagawe',
            ),
            114 => 
            array (
                'id' => 645,
                'province_id' => 37,
                'municipality_name' => 'Mayoyao',
            ),
            115 => 
            array (
                'id' => 646,
                'province_id' => 38,
                'municipality_name' => 'Adams',
            ),
            116 => 
            array (
                'id' => 647,
                'province_id' => 38,
                'municipality_name' => 'Badoc',
            ),
            117 => 
            array (
                'id' => 648,
                'province_id' => 38,
            'municipality_name' => 'Banna (Espiritu)',
            ),
            118 => 
            array (
                'id' => 649,
                'province_id' => 38,
                'municipality_name' => 'Burgos',
            ),
            119 => 
            array (
                'id' => 650,
                'province_id' => 38,
                'municipality_name' => 'Currimao',
            ),
            120 => 
            array (
                'id' => 651,
                'province_id' => 38,
                'municipality_name' => 'Dumalneg',
            ),
            121 => 
            array (
                'id' => 652,
                'province_id' => 38,
                'municipality_name' => 'Marcos',
            ),
            122 => 
            array (
                'id' => 653,
                'province_id' => 38,
                'municipality_name' => 'Pagudpud',
            ),
            123 => 
            array (
                'id' => 654,
                'province_id' => 38,
                'municipality_name' => 'Pasuquin',
            ),
            124 => 
            array (
                'id' => 655,
                'province_id' => 38,
                'municipality_name' => 'Pinili',
            ),
            125 => 
            array (
                'id' => 656,
                'province_id' => 38,
                'municipality_name' => 'Sarrat',
            ),
            126 => 
            array (
                'id' => 657,
                'province_id' => 38,
                'municipality_name' => 'Vintar',
            ),
            127 => 
            array (
                'id' => 658,
                'province_id' => 38,
                'municipality_name' => 'Bacarra',
            ),
            128 => 
            array (
                'id' => 659,
                'province_id' => 38,
                'municipality_name' => 'Bangui',
            ),
            129 => 
            array (
                'id' => 660,
                'province_id' => 38,
                'municipality_name' => 'Batac',
            ),
            130 => 
            array (
                'id' => 661,
                'province_id' => 38,
                'municipality_name' => 'Carasi',
            ),
            131 => 
            array (
                'id' => 662,
                'province_id' => 38,
                'municipality_name' => 'Dingras',
            ),
            132 => 
            array (
                'id' => 663,
                'province_id' => 38,
                'municipality_name' => 'Laoag',
            ),
            133 => 
            array (
                'id' => 664,
                'province_id' => 38,
                'municipality_name' => 'Nueva Era',
            ),
            134 => 
            array (
                'id' => 665,
                'province_id' => 38,
                'municipality_name' => 'Paoay',
            ),
            135 => 
            array (
                'id' => 666,
                'province_id' => 38,
                'municipality_name' => 'Piddig',
            ),
            136 => 
            array (
                'id' => 667,
                'province_id' => 38,
                'municipality_name' => 'San Nicolas',
            ),
            137 => 
            array (
                'id' => 668,
                'province_id' => 38,
                'municipality_name' => 'Solsona',
            ),
            138 => 
            array (
                'id' => 669,
                'province_id' => 39,
                'municipality_name' => 'Alilem',
            ),
            139 => 
            array (
                'id' => 670,
                'province_id' => 39,
                'municipality_name' => 'Bantay',
            ),
            140 => 
            array (
                'id' => 671,
                'province_id' => 39,
                'municipality_name' => 'Cabugao',
            ),
            141 => 
            array (
                'id' => 672,
                'province_id' => 39,
                'municipality_name' => 'Caoayan',
            ),
            142 => 
            array (
                'id' => 673,
                'province_id' => 39,
                'municipality_name' => 'Galimuyod',
            ),
            143 => 
            array (
                'id' => 674,
                'province_id' => 39,
                'municipality_name' => 'Lidlidda',
            ),
            144 => 
            array (
                'id' => 675,
                'province_id' => 39,
                'municipality_name' => 'Nagbukel',
            ),
            145 => 
            array (
                'id' => 676,
                'province_id' => 39,
            'municipality_name' => 'Quirino (Angkaki)',
            ),
            146 => 
            array (
                'id' => 677,
                'province_id' => 39,
                'municipality_name' => 'San Emilio',
            ),
            147 => 
            array (
                'id' => 678,
                'province_id' => 39,
                'municipality_name' => 'San Ildefonso',
            ),
            148 => 
            array (
                'id' => 679,
                'province_id' => 39,
                'municipality_name' => 'San Vicente',
            ),
            149 => 
            array (
                'id' => 680,
                'province_id' => 39,
                'municipality_name' => 'Santa Catalina',
            ),
            150 => 
            array (
                'id' => 681,
                'province_id' => 39,
                'municipality_name' => 'Santa Lucia',
            ),
            151 => 
            array (
                'id' => 682,
                'province_id' => 39,
                'municipality_name' => 'Santiago',
            ),
            152 => 
            array (
                'id' => 683,
                'province_id' => 39,
                'municipality_name' => 'Sigay',
            ),
            153 => 
            array (
                'id' => 684,
                'province_id' => 39,
                'municipality_name' => 'Sugpon',
            ),
            154 => 
            array (
                'id' => 685,
                'province_id' => 39,
                'municipality_name' => 'Tagudin',
            ),
            155 => 
            array (
                'id' => 686,
                'province_id' => 39,
                'municipality_name' => 'Banayoyo',
            ),
            156 => 
            array (
                'id' => 687,
                'province_id' => 39,
                'municipality_name' => 'Burgos',
            ),
            157 => 
            array (
                'id' => 688,
                'province_id' => 39,
                'municipality_name' => 'Candon',
            ),
            158 => 
            array (
                'id' => 689,
                'province_id' => 39,
                'municipality_name' => 'Cervantes',
            ),
            159 => 
            array (
                'id' => 690,
                'province_id' => 39,
            'municipality_name' => 'Gregorio del Pilar (Concepcion)',
            ),
            160 => 
            array (
                'id' => 691,
                'province_id' => 39,
                'municipality_name' => 'Magsingal',
            ),
            161 => 
            array (
                'id' => 692,
                'province_id' => 39,
                'municipality_name' => 'Narvacan',
            ),
            162 => 
            array (
                'id' => 693,
                'province_id' => 39,
            'municipality_name' => 'Salcedo (Baugen)',
            ),
            163 => 
            array (
                'id' => 694,
                'province_id' => 39,
                'municipality_name' => 'San Esteban',
            ),
            164 => 
            array (
                'id' => 695,
                'province_id' => 39,
            'municipality_name' => 'San Juan (Lapog)',
            ),
            165 => 
            array (
                'id' => 696,
                'province_id' => 39,
                'municipality_name' => 'Santa',
            ),
            166 => 
            array (
                'id' => 697,
                'province_id' => 39,
                'municipality_name' => 'Santa Cruz',
            ),
            167 => 
            array (
                'id' => 698,
                'province_id' => 39,
                'municipality_name' => 'Santa Maria',
            ),
            168 => 
            array (
                'id' => 699,
                'province_id' => 39,
                'municipality_name' => 'Santo Domingo',
            ),
            169 => 
            array (
                'id' => 700,
                'province_id' => 39,
                'municipality_name' => 'Sinait',
            ),
            170 => 
            array (
                'id' => 701,
                'province_id' => 39,
                'municipality_name' => 'Suyo',
            ),
            171 => 
            array (
                'id' => 702,
                'province_id' => 39,
                'municipality_name' => 'Vigan',
            ),
            172 => 
            array (
                'id' => 703,
                'province_id' => 40,
                'municipality_name' => 'Ajuy',
            ),
            173 => 
            array (
                'id' => 704,
                'province_id' => 40,
                'municipality_name' => 'Anilao',
            ),
            174 => 
            array (
                'id' => 705,
                'province_id' => 40,
                'municipality_name' => 'Balasan',
            ),
            175 => 
            array (
                'id' => 706,
                'province_id' => 40,
                'municipality_name' => 'Barotac Nuevo',
            ),
            176 => 
            array (
                'id' => 707,
                'province_id' => 40,
                'municipality_name' => 'Batad',
            ),
            177 => 
            array (
                'id' => 708,
                'province_id' => 40,
                'municipality_name' => 'Cabatuan',
            ),
            178 => 
            array (
                'id' => 709,
                'province_id' => 40,
                'municipality_name' => 'Carles',
            ),
            179 => 
            array (
                'id' => 710,
                'province_id' => 40,
                'municipality_name' => 'Dingle',
            ),
            180 => 
            array (
                'id' => 711,
                'province_id' => 40,
                'municipality_name' => 'Dumangas',
            ),
            181 => 
            array (
                'id' => 712,
                'province_id' => 40,
                'municipality_name' => 'Guimbal',
            ),
            182 => 
            array (
                'id' => 713,
                'province_id' => 40,
                'municipality_name' => 'Iloilo City',
            ),
            183 => 
            array (
                'id' => 714,
                'province_id' => 40,
                'municipality_name' => 'Lambunao',
            ),
            184 => 
            array (
                'id' => 715,
                'province_id' => 40,
                'municipality_name' => 'Lemery',
            ),
            185 => 
            array (
                'id' => 716,
                'province_id' => 40,
                'municipality_name' => 'Maasin',
            ),
            186 => 
            array (
                'id' => 717,
                'province_id' => 40,
                'municipality_name' => 'Mina',
            ),
            187 => 
            array (
                'id' => 718,
                'province_id' => 40,
                'municipality_name' => 'Oton',
            ),
            188 => 
            array (
                'id' => 719,
                'province_id' => 40,
                'municipality_name' => 'Pavia',
            ),
            189 => 
            array (
                'id' => 720,
                'province_id' => 40,
                'municipality_name' => 'San Dionisio',
            ),
            190 => 
            array (
                'id' => 721,
                'province_id' => 40,
                'municipality_name' => 'San Joaquin',
            ),
            191 => 
            array (
                'id' => 722,
                'province_id' => 40,
                'municipality_name' => 'San Rafael',
            ),
            192 => 
            array (
                'id' => 723,
                'province_id' => 40,
                'municipality_name' => 'Sara',
            ),
            193 => 
            array (
                'id' => 724,
                'province_id' => 40,
                'municipality_name' => 'Tubungan',
            ),
            194 => 
            array (
                'id' => 725,
                'province_id' => 40,
                'municipality_name' => 'Alimodian',
            ),
            195 => 
            array (
                'id' => 726,
                'province_id' => 40,
                'municipality_name' => 'Badiangan',
            ),
            196 => 
            array (
                'id' => 727,
                'province_id' => 40,
                'municipality_name' => 'Banate',
            ),
            197 => 
            array (
                'id' => 728,
                'province_id' => 40,
                'municipality_name' => 'Barotac Viejo',
            ),
            198 => 
            array (
                'id' => 729,
                'province_id' => 40,
                'municipality_name' => 'Bingawan',
            ),
            199 => 
            array (
                'id' => 730,
                'province_id' => 40,
                'municipality_name' => 'Calinog',
            ),
            200 => 
            array (
                'id' => 731,
                'province_id' => 40,
                'municipality_name' => 'Concepcion',
            ),
            201 => 
            array (
                'id' => 732,
                'province_id' => 40,
                'municipality_name' => 'Due&ntilde;as',
            ),
            202 => 
            array (
                'id' => 733,
                'province_id' => 40,
                'municipality_name' => 'Estancia',
            ),
            203 => 
            array (
                'id' => 734,
                'province_id' => 40,
                'municipality_name' => 'Igbaras',
            ),
            204 => 
            array (
                'id' => 735,
                'province_id' => 40,
                'municipality_name' => 'Janiuay',
            ),
            205 => 
            array (
                'id' => 736,
                'province_id' => 40,
                'municipality_name' => 'Leganes',
            ),
            206 => 
            array (
                'id' => 737,
                'province_id' => 40,
                'municipality_name' => 'Leon',
            ),
            207 => 
            array (
                'id' => 738,
                'province_id' => 40,
                'municipality_name' => 'Miagao',
            ),
            208 => 
            array (
                'id' => 739,
                'province_id' => 40,
                'municipality_name' => 'New Lucena',
            ),
            209 => 
            array (
                'id' => 740,
                'province_id' => 40,
                'municipality_name' => 'Passi',
            ),
            210 => 
            array (
                'id' => 741,
                'province_id' => 40,
                'municipality_name' => 'Pototan',
            ),
            211 => 
            array (
                'id' => 742,
                'province_id' => 40,
                'municipality_name' => 'San Enrique',
            ),
            212 => 
            array (
                'id' => 743,
                'province_id' => 40,
                'municipality_name' => 'San Miguel',
            ),
            213 => 
            array (
                'id' => 744,
                'province_id' => 40,
                'municipality_name' => 'Santa Barbara',
            ),
            214 => 
            array (
                'id' => 745,
                'province_id' => 40,
                'municipality_name' => 'Tigbauan',
            ),
            215 => 
            array (
                'id' => 746,
                'province_id' => 40,
                'municipality_name' => 'Zarraga',
            ),
            216 => 
            array (
                'id' => 747,
                'province_id' => 41,
                'municipality_name' => 'Alicia',
            ),
            217 => 
            array (
                'id' => 748,
                'province_id' => 41,
                'municipality_name' => 'Aurora',
            ),
            218 => 
            array (
                'id' => 749,
                'province_id' => 41,
                'municipality_name' => 'Burgos',
            ),
            219 => 
            array (
                'id' => 750,
                'province_id' => 41,
                'municipality_name' => 'Cabatuan',
            ),
            220 => 
            array (
                'id' => 751,
                'province_id' => 41,
                'municipality_name' => 'Cordon',
            ),
            221 => 
            array (
                'id' => 752,
                'province_id' => 41,
                'municipality_name' => 'Dinapigue',
            ),
            222 => 
            array (
                'id' => 753,
                'province_id' => 41,
                'municipality_name' => 'Echague',
            ),
            223 => 
            array (
                'id' => 754,
                'province_id' => 41,
                'municipality_name' => 'Ilagan',
            ),
            224 => 
            array (
                'id' => 755,
                'province_id' => 41,
                'municipality_name' => 'Luna',
            ),
            225 => 
            array (
                'id' => 756,
                'province_id' => 41,
                'municipality_name' => 'Mallig',
            ),
            226 => 
            array (
                'id' => 757,
                'province_id' => 41,
                'municipality_name' => 'Palanan',
            ),
            227 => 
            array (
                'id' => 758,
                'province_id' => 41,
                'municipality_name' => 'Quirino',
            ),
            228 => 
            array (
                'id' => 759,
                'province_id' => 41,
                'municipality_name' => 'Reina Mercedes',
            ),
            229 => 
            array (
                'id' => 760,
                'province_id' => 41,
                'municipality_name' => 'San Agustin',
            ),
            230 => 
            array (
                'id' => 761,
                'province_id' => 41,
                'municipality_name' => 'San Isidro',
            ),
            231 => 
            array (
                'id' => 762,
                'province_id' => 41,
                'municipality_name' => 'San Mariano',
            ),
            232 => 
            array (
                'id' => 763,
                'province_id' => 41,
                'municipality_name' => 'San Pablo',
            ),
            233 => 
            array (
                'id' => 764,
                'province_id' => 41,
                'municipality_name' => 'Santiago',
            ),
            234 => 
            array (
                'id' => 765,
                'province_id' => 41,
                'municipality_name' => 'Tumauini',
            ),
            235 => 
            array (
                'id' => 766,
                'province_id' => 41,
                'municipality_name' => 'Angadanan',
            ),
            236 => 
            array (
                'id' => 767,
                'province_id' => 41,
                'municipality_name' => 'Benito Soliven',
            ),
            237 => 
            array (
                'id' => 768,
                'province_id' => 41,
                'municipality_name' => 'Cabagan',
            ),
            238 => 
            array (
                'id' => 769,
                'province_id' => 41,
                'municipality_name' => 'Cauayan',
            ),
            239 => 
            array (
                'id' => 770,
                'province_id' => 41,
            'municipality_name' => 'Delfin Albano (Magsaysay)',
            ),
            240 => 
            array (
                'id' => 771,
                'province_id' => 41,
                'municipality_name' => 'Divilacan',
            ),
            241 => 
            array (
                'id' => 772,
                'province_id' => 41,
                'municipality_name' => 'Gamu',
            ),
            242 => 
            array (
                'id' => 773,
                'province_id' => 41,
                'municipality_name' => 'Jones',
            ),
            243 => 
            array (
                'id' => 774,
                'province_id' => 41,
                'municipality_name' => 'Maconacon',
            ),
            244 => 
            array (
                'id' => 775,
                'province_id' => 41,
                'municipality_name' => 'Naguilian',
            ),
            245 => 
            array (
                'id' => 776,
                'province_id' => 41,
                'municipality_name' => 'Quezon',
            ),
            246 => 
            array (
                'id' => 777,
                'province_id' => 41,
                'municipality_name' => 'Ramon',
            ),
            247 => 
            array (
                'id' => 778,
                'province_id' => 41,
                'municipality_name' => 'Roxas',
            ),
            248 => 
            array (
                'id' => 779,
                'province_id' => 41,
                'municipality_name' => 'San Guillermo',
            ),
            249 => 
            array (
                'id' => 780,
                'province_id' => 41,
            'municipality_name' => 'San Manuel (Callang)',
            ),
            250 => 
            array (
                'id' => 781,
                'province_id' => 41,
                'municipality_name' => 'San Mateo',
            ),
            251 => 
            array (
                'id' => 782,
                'province_id' => 41,
                'municipality_name' => 'Santa Maria',
            ),
            252 => 
            array (
                'id' => 783,
                'province_id' => 41,
                'municipality_name' => 'Santo Tomas',
            ),
            253 => 
            array (
                'id' => 784,
                'province_id' => 42,
                'municipality_name' => 'Balbalan',
            ),
            254 => 
            array (
                'id' => 785,
                'province_id' => 42,
                'municipality_name' => 'Pasil',
            ),
            255 => 
            array (
                'id' => 786,
                'province_id' => 42,
            'municipality_name' => 'Rizal (Liwan)',
            ),
            256 => 
            array (
                'id' => 787,
                'province_id' => 42,
                'municipality_name' => 'Tanudan',
            ),
            257 => 
            array (
                'id' => 788,
                'province_id' => 42,
                'municipality_name' => 'Lubuagan',
            ),
            258 => 
            array (
                'id' => 789,
                'province_id' => 42,
                'municipality_name' => 'Pinukpuk',
            ),
            259 => 
            array (
                'id' => 790,
                'province_id' => 42,
                'municipality_name' => 'Tabuk',
            ),
            260 => 
            array (
                'id' => 791,
                'province_id' => 42,
                'municipality_name' => 'Tinglayan',
            ),
            261 => 
            array (
                'id' => 792,
                'province_id' => 43,
                'municipality_name' => 'Agoo',
            ),
            262 => 
            array (
                'id' => 793,
                'province_id' => 43,
                'municipality_name' => 'Bacnotan',
            ),
            263 => 
            array (
                'id' => 794,
                'province_id' => 43,
                'municipality_name' => 'Balaoan',
            ),
            264 => 
            array (
                'id' => 795,
                'province_id' => 43,
                'municipality_name' => 'Bauang',
            ),
            265 => 
            array (
                'id' => 796,
                'province_id' => 43,
                'municipality_name' => 'Caba',
            ),
            266 => 
            array (
                'id' => 797,
                'province_id' => 43,
                'municipality_name' => 'Naguilian',
            ),
            267 => 
            array (
                'id' => 798,
                'province_id' => 43,
                'municipality_name' => 'Rosario',
            ),
            268 => 
            array (
                'id' => 799,
                'province_id' => 43,
                'municipality_name' => 'San Gabriel',
            ),
            269 => 
            array (
                'id' => 800,
                'province_id' => 43,
                'municipality_name' => 'Santo Tomas',
            ),
            270 => 
            array (
                'id' => 801,
                'province_id' => 43,
                'municipality_name' => 'Sudipen',
            ),
            271 => 
            array (
                'id' => 802,
                'province_id' => 43,
                'municipality_name' => 'Aringay',
            ),
            272 => 
            array (
                'id' => 803,
                'province_id' => 43,
                'municipality_name' => 'Bagulin',
            ),
            273 => 
            array (
                'id' => 804,
                'province_id' => 43,
                'municipality_name' => 'Bangar',
            ),
            274 => 
            array (
                'id' => 805,
                'province_id' => 43,
                'municipality_name' => 'Burgos',
            ),
            275 => 
            array (
                'id' => 806,
                'province_id' => 43,
                'municipality_name' => 'Luna',
            ),
            276 => 
            array (
                'id' => 807,
                'province_id' => 43,
                'municipality_name' => 'Pugo',
            ),
            277 => 
            array (
                'id' => 808,
                'province_id' => 43,
                'municipality_name' => 'San Fernando',
            ),
            278 => 
            array (
                'id' => 809,
                'province_id' => 43,
                'municipality_name' => 'San Juan',
            ),
            279 => 
            array (
                'id' => 810,
                'province_id' => 43,
                'municipality_name' => 'Santol',
            ),
            280 => 
            array (
                'id' => 811,
                'province_id' => 43,
                'municipality_name' => 'Tubao',
            ),
            281 => 
            array (
                'id' => 812,
                'province_id' => 44,
                'municipality_name' => 'Alaminos',
            ),
            282 => 
            array (
                'id' => 813,
                'province_id' => 44,
                'municipality_name' => 'Bi&ntilde;an',
            ),
            283 => 
            array (
                'id' => 814,
                'province_id' => 44,
                'municipality_name' => 'Calamba',
            ),
            284 => 
            array (
                'id' => 815,
                'province_id' => 44,
                'municipality_name' => 'Cavinti',
            ),
            285 => 
            array (
                'id' => 816,
                'province_id' => 44,
                'municipality_name' => 'Kalayaan',
            ),
            286 => 
            array (
                'id' => 817,
                'province_id' => 44,
                'municipality_name' => 'Los Ba&ntilde;os',
            ),
            287 => 
            array (
                'id' => 818,
                'province_id' => 44,
                'municipality_name' => 'Lumban',
            ),
            288 => 
            array (
                'id' => 819,
                'province_id' => 44,
                'municipality_name' => 'Magdalena',
            ),
            289 => 
            array (
                'id' => 820,
                'province_id' => 44,
                'municipality_name' => 'Nagcarlan',
            ),
            290 => 
            array (
                'id' => 821,
                'province_id' => 44,
                'municipality_name' => 'Pagsanjan',
            ),
            291 => 
            array (
                'id' => 822,
                'province_id' => 44,
                'municipality_name' => 'Pangil',
            ),
            292 => 
            array (
                'id' => 823,
                'province_id' => 44,
                'municipality_name' => 'Rizal',
            ),
            293 => 
            array (
                'id' => 824,
                'province_id' => 44,
                'municipality_name' => 'San Pedro',
            ),
            294 => 
            array (
                'id' => 825,
                'province_id' => 44,
                'municipality_name' => 'Santa Maria',
            ),
            295 => 
            array (
                'id' => 826,
                'province_id' => 44,
                'municipality_name' => 'Siniloan',
            ),
            296 => 
            array (
                'id' => 827,
                'province_id' => 44,
                'municipality_name' => 'Bay',
            ),
            297 => 
            array (
                'id' => 828,
                'province_id' => 44,
                'municipality_name' => 'Cabuyao',
            ),
            298 => 
            array (
                'id' => 829,
                'province_id' => 44,
                'municipality_name' => 'Calauan',
            ),
            299 => 
            array (
                'id' => 830,
                'province_id' => 44,
                'municipality_name' => 'Famy',
            ),
            300 => 
            array (
                'id' => 831,
                'province_id' => 44,
                'municipality_name' => 'Liliw',
            ),
            301 => 
            array (
                'id' => 832,
                'province_id' => 44,
                'municipality_name' => 'Luisiana',
            ),
            302 => 
            array (
                'id' => 833,
                'province_id' => 44,
                'municipality_name' => 'Mabitac',
            ),
            303 => 
            array (
                'id' => 834,
                'province_id' => 44,
                'municipality_name' => 'Majayjay',
            ),
            304 => 
            array (
                'id' => 835,
                'province_id' => 44,
                'municipality_name' => 'Paete',
            ),
            305 => 
            array (
                'id' => 836,
                'province_id' => 44,
                'municipality_name' => 'Pakil',
            ),
            306 => 
            array (
                'id' => 837,
                'province_id' => 44,
                'municipality_name' => 'Pila',
            ),
            307 => 
            array (
                'id' => 838,
                'province_id' => 44,
                'municipality_name' => 'San Pablo',
            ),
            308 => 
            array (
                'id' => 839,
                'province_id' => 44,
                'municipality_name' => 'Santa Cruz',
            ),
            309 => 
            array (
                'id' => 840,
                'province_id' => 44,
                'municipality_name' => 'Santa Rosa',
            ),
            310 => 
            array (
                'id' => 841,
                'province_id' => 44,
                'municipality_name' => 'Victoria',
            ),
            311 => 
            array (
                'id' => 842,
                'province_id' => 45,
                'municipality_name' => 'Tangcal',
            ),
            312 => 
            array (
                'id' => 843,
                'province_id' => 45,
                'municipality_name' => 'Bacolod',
            ),
            313 => 
            array (
                'id' => 844,
                'province_id' => 45,
                'municipality_name' => 'Baroy',
            ),
            314 => 
            array (
                'id' => 845,
                'province_id' => 45,
                'municipality_name' => 'Kapatagan',
            ),
            315 => 
            array (
                'id' => 846,
                'province_id' => 45,
                'municipality_name' => 'Kolambugan',
            ),
            316 => 
            array (
                'id' => 847,
                'province_id' => 45,
                'municipality_name' => 'Linamon',
            ),
            317 => 
            array (
                'id' => 848,
                'province_id' => 45,
                'municipality_name' => 'Maigo',
            ),
            318 => 
            array (
                'id' => 849,
                'province_id' => 45,
                'municipality_name' => 'Munai',
            ),
            319 => 
            array (
                'id' => 850,
                'province_id' => 45,
                'municipality_name' => 'Pantao Ragat',
            ),
            320 => 
            array (
                'id' => 851,
                'province_id' => 45,
                'municipality_name' => 'Poona Piagapo',
            ),
            321 => 
            array (
                'id' => 852,
                'province_id' => 45,
                'municipality_name' => 'Sapad',
            ),
            322 => 
            array (
                'id' => 853,
                'province_id' => 45,
                'municipality_name' => 'Tagoloan',
            ),
            323 => 
            array (
                'id' => 854,
                'province_id' => 45,
                'municipality_name' => 'Tubod',
            ),
            324 => 
            array (
                'id' => 855,
                'province_id' => 45,
                'municipality_name' => 'Baloi',
            ),
            325 => 
            array (
                'id' => 856,
                'province_id' => 45,
                'municipality_name' => 'Iligan',
            ),
            326 => 
            array (
                'id' => 857,
                'province_id' => 45,
                'municipality_name' => 'Kauswagan',
            ),
            327 => 
            array (
                'id' => 858,
                'province_id' => 45,
                'municipality_name' => 'Lala',
            ),
            328 => 
            array (
                'id' => 859,
                'province_id' => 45,
                'municipality_name' => 'Magsaysay',
            ),
            329 => 
            array (
                'id' => 860,
                'province_id' => 45,
                'municipality_name' => 'Matungao',
            ),
            330 => 
            array (
                'id' => 861,
                'province_id' => 45,
                'municipality_name' => 'Nunungan',
            ),
            331 => 
            array (
                'id' => 862,
                'province_id' => 45,
                'municipality_name' => 'Pantar',
            ),
            332 => 
            array (
                'id' => 863,
                'province_id' => 45,
                'municipality_name' => 'Salvador',
            ),
            333 => 
            array (
                'id' => 864,
                'province_id' => 45,
            'municipality_name' => 'Sultan Naga Dimaporo (Karomatan)',
            ),
            334 => 
            array (
                'id' => 865,
                'province_id' => 46,
            'municipality_name' => 'Amai Manabilang (Bumbaran)',
            ),
            335 => 
            array (
                'id' => 866,
                'province_id' => 46,
                'municipality_name' => 'Balabagan',
            ),
            336 => 
            array (
                'id' => 867,
                'province_id' => 46,
                'municipality_name' => 'Bayang',
            ),
            337 => 
            array (
                'id' => 868,
                'province_id' => 46,
                'municipality_name' => 'Buadiposo-Buntong',
            ),
            338 => 
            array (
                'id' => 869,
                'province_id' => 46,
                'municipality_name' => 'Butig',
            ),
            339 => 
            array (
                'id' => 870,
                'province_id' => 46,
                'municipality_name' => 'Ditsaan-Ramain',
            ),
            340 => 
            array (
                'id' => 871,
                'province_id' => 46,
                'municipality_name' => 'Kapai',
            ),
            341 => 
            array (
                'id' => 872,
                'province_id' => 46,
            'municipality_name' => 'Lumba-Bayabao (Maguing)',
            ),
            342 => 
            array (
                'id' => 873,
                'province_id' => 46,
                'municipality_name' => 'Lumbatan',
            ),
            343 => 
            array (
                'id' => 874,
                'province_id' => 46,
                'municipality_name' => 'Madalum',
            ),
            344 => 
            array (
                'id' => 875,
                'province_id' => 46,
                'municipality_name' => 'Maguing',
            ),
            345 => 
            array (
                'id' => 876,
                'province_id' => 46,
                'municipality_name' => 'Marantao',
            ),
            346 => 
            array (
                'id' => 877,
                'province_id' => 46,
                'municipality_name' => 'Marogong',
            ),
            347 => 
            array (
                'id' => 878,
                'province_id' => 46,
                'municipality_name' => 'Mulondo',
            ),
            348 => 
            array (
                'id' => 879,
                'province_id' => 46,
                'municipality_name' => 'Piagapo',
            ),
            349 => 
            array (
                'id' => 880,
                'province_id' => 46,
            'municipality_name' => 'Poona Bayabao (Gata)',
            ),
            350 => 
            array (
                'id' => 881,
                'province_id' => 46,
                'municipality_name' => 'Saguiaran',
            ),
            351 => 
            array (
                'id' => 882,
                'province_id' => 46,
                'municipality_name' => 'Tagoloan II',
            ),
            352 => 
            array (
                'id' => 883,
                'province_id' => 46,
                'municipality_name' => 'Taraka',
            ),
            353 => 
            array (
                'id' => 884,
                'province_id' => 46,
                'municipality_name' => 'Tugaya',
            ),
            354 => 
            array (
                'id' => 885,
                'province_id' => 46,
            'municipality_name' => 'Bacolod-Kalawi (Bacolod-Grande)',
            ),
            355 => 
            array (
                'id' => 886,
                'province_id' => 46,
            'municipality_name' => 'Balindong (Watu)',
            ),
            356 => 
            array (
                'id' => 887,
                'province_id' => 46,
                'municipality_name' => 'Binidayan',
            ),
            357 => 
            array (
                'id' => 888,
                'province_id' => 46,
                'municipality_name' => 'Bubong',
            ),
            358 => 
            array (
                'id' => 889,
                'province_id' => 46,
                'municipality_name' => 'Calanogas',
            ),
            359 => 
            array (
                'id' => 890,
                'province_id' => 46,
                'municipality_name' => 'Ganassi',
            ),
            360 => 
            array (
                'id' => 891,
                'province_id' => 46,
                'municipality_name' => 'Kapatagan',
            ),
            361 => 
            array (
                'id' => 892,
                'province_id' => 46,
                'municipality_name' => 'Lumbaca-Unayan',
            ),
            362 => 
            array (
                'id' => 893,
                'province_id' => 46,
                'municipality_name' => 'Lumbayanague',
            ),
            363 => 
            array (
                'id' => 894,
                'province_id' => 46,
                'municipality_name' => 'Madamba',
            ),
            364 => 
            array (
                'id' => 895,
                'province_id' => 46,
                'municipality_name' => 'Malabang',
            ),
            365 => 
            array (
                'id' => 896,
                'province_id' => 46,
                'municipality_name' => 'Marawi',
            ),
            366 => 
            array (
                'id' => 897,
                'province_id' => 46,
                'municipality_name' => 'Masiu',
            ),
            367 => 
            array (
                'id' => 898,
                'province_id' => 46,
            'municipality_name' => 'Pagayawan (Tatarikan)',
            ),
            368 => 
            array (
                'id' => 899,
                'province_id' => 46,
            'municipality_name' => 'Picong (Sultan Gumander)',
            ),
            369 => 
            array (
                'id' => 900,
                'province_id' => 46,
                'municipality_name' => 'Pualas',
            ),
            370 => 
            array (
                'id' => 901,
                'province_id' => 46,
                'municipality_name' => 'Sultan Dumalondong',
            ),
            371 => 
            array (
                'id' => 902,
                'province_id' => 46,
                'municipality_name' => 'Tamparan',
            ),
            372 => 
            array (
                'id' => 903,
                'province_id' => 46,
                'municipality_name' => 'Tubaran',
            ),
            373 => 
            array (
                'id' => 904,
                'province_id' => 46,
                'municipality_name' => 'Wao',
            ),
            374 => 
            array (
                'id' => 905,
                'province_id' => 47,
                'municipality_name' => 'Abuyog',
            ),
            375 => 
            array (
                'id' => 906,
                'province_id' => 47,
                'municipality_name' => 'Albuera',
            ),
            376 => 
            array (
                'id' => 907,
                'province_id' => 47,
                'municipality_name' => 'Barugo',
            ),
            377 => 
            array (
                'id' => 908,
                'province_id' => 47,
                'municipality_name' => 'Baybay',
            ),
            378 => 
            array (
                'id' => 909,
                'province_id' => 47,
                'municipality_name' => 'Calubian',
            ),
            379 => 
            array (
                'id' => 910,
                'province_id' => 47,
                'municipality_name' => 'Carigara',
            ),
            380 => 
            array (
                'id' => 911,
                'province_id' => 47,
                'municipality_name' => 'Dulag',
            ),
            381 => 
            array (
                'id' => 912,
                'province_id' => 47,
                'municipality_name' => 'Hindang',
            ),
            382 => 
            array (
                'id' => 913,
                'province_id' => 47,
                'municipality_name' => 'Isabel',
            ),
            383 => 
            array (
                'id' => 914,
                'province_id' => 47,
            'municipality_name' => 'Javier (Bugho)',
            ),
            384 => 
            array (
                'id' => 915,
                'province_id' => 47,
                'municipality_name' => 'Kananga',
            ),
            385 => 
            array (
                'id' => 916,
                'province_id' => 47,
                'municipality_name' => 'Leyte',
            ),
            386 => 
            array (
                'id' => 917,
                'province_id' => 47,
                'municipality_name' => 'Mahaplag',
            ),
            387 => 
            array (
                'id' => 918,
                'province_id' => 47,
                'municipality_name' => 'Matalom',
            ),
            388 => 
            array (
                'id' => 919,
                'province_id' => 47,
                'municipality_name' => 'Merida',
            ),
            389 => 
            array (
                'id' => 920,
                'province_id' => 47,
                'municipality_name' => 'Palo',
            ),
            390 => 
            array (
                'id' => 921,
                'province_id' => 47,
                'municipality_name' => 'Pastrana',
            ),
            391 => 
            array (
                'id' => 922,
                'province_id' => 47,
                'municipality_name' => 'San Miguel',
            ),
            392 => 
            array (
                'id' => 923,
                'province_id' => 47,
                'municipality_name' => 'Tabango',
            ),
            393 => 
            array (
                'id' => 924,
                'province_id' => 47,
                'municipality_name' => 'Tacloban',
            ),
            394 => 
            array (
                'id' => 925,
                'province_id' => 47,
                'municipality_name' => 'Tolosa',
            ),
            395 => 
            array (
                'id' => 926,
                'province_id' => 47,
                'municipality_name' => 'Villaba',
            ),
            396 => 
            array (
                'id' => 927,
                'province_id' => 47,
                'municipality_name' => 'Alangalang',
            ),
            397 => 
            array (
                'id' => 928,
                'province_id' => 47,
                'municipality_name' => 'Babatngon',
            ),
            398 => 
            array (
                'id' => 929,
                'province_id' => 47,
                'municipality_name' => 'Bato',
            ),
            399 => 
            array (
                'id' => 930,
                'province_id' => 47,
                'municipality_name' => 'Burauen',
            ),
            400 => 
            array (
                'id' => 931,
                'province_id' => 47,
                'municipality_name' => 'Capoocan',
            ),
            401 => 
            array (
                'id' => 932,
                'province_id' => 47,
                'municipality_name' => 'Dagami',
            ),
            402 => 
            array (
                'id' => 933,
                'province_id' => 47,
                'municipality_name' => 'Hilongos',
            ),
            403 => 
            array (
                'id' => 934,
                'province_id' => 47,
                'municipality_name' => 'Inopacan',
            ),
            404 => 
            array (
                'id' => 935,
                'province_id' => 47,
                'municipality_name' => 'Jaro',
            ),
            405 => 
            array (
                'id' => 936,
                'province_id' => 47,
                'municipality_name' => 'Julita',
            ),
            406 => 
            array (
                'id' => 937,
                'province_id' => 47,
                'municipality_name' => 'La Paz',
            ),
            407 => 
            array (
                'id' => 938,
                'province_id' => 47,
                'municipality_name' => 'MacArthur',
            ),
            408 => 
            array (
                'id' => 939,
                'province_id' => 47,
                'municipality_name' => 'Matag-ob',
            ),
            409 => 
            array (
                'id' => 940,
                'province_id' => 47,
                'municipality_name' => 'Mayorga',
            ),
            410 => 
            array (
                'id' => 941,
                'province_id' => 47,
                'municipality_name' => 'Ormoc',
            ),
            411 => 
            array (
                'id' => 942,
                'province_id' => 47,
                'municipality_name' => 'Palompon',
            ),
            412 => 
            array (
                'id' => 943,
                'province_id' => 47,
                'municipality_name' => 'San Isidro',
            ),
            413 => 
            array (
                'id' => 944,
                'province_id' => 47,
                'municipality_name' => 'Santa Fe',
            ),
            414 => 
            array (
                'id' => 945,
                'province_id' => 47,
                'municipality_name' => 'Tabontabon',
            ),
            415 => 
            array (
                'id' => 946,
                'province_id' => 47,
                'municipality_name' => 'Tanauan',
            ),
            416 => 
            array (
                'id' => 947,
                'province_id' => 47,
                'municipality_name' => 'Tunga',
            ),
            417 => 
            array (
                'id' => 948,
                'province_id' => 48,
                'municipality_name' => 'Ampatuan',
            ),
            418 => 
            array (
                'id' => 949,
                'province_id' => 48,
                'municipality_name' => 'Buldon',
            ),
            419 => 
            array (
                'id' => 950,
                'province_id' => 48,
                'municipality_name' => 'Cotabato City',
            ),
            420 => 
            array (
                'id' => 951,
                'province_id' => 48,
                'municipality_name' => 'Datu Anggal Midtimbang',
            ),
            421 => 
            array (
                'id' => 952,
                'province_id' => 48,
                'municipality_name' => 'Datu Hoffer Ampatuan',
            ),
            422 => 
            array (
                'id' => 953,
                'province_id' => 48,
            'municipality_name' => 'Datu Odin Sinsuat (Dinaig)',
            ),
            423 => 
            array (
                'id' => 954,
                'province_id' => 48,
            'municipality_name' => 'Datu Piang (Dulawan)',
            ),
            424 => 
            array (
                'id' => 955,
                'province_id' => 48,
                'municipality_name' => 'Datu Saudi-Ampatuan',
            ),
            425 => 
            array (
                'id' => 956,
                'province_id' => 48,
                'municipality_name' => 'General Salipada K. Pendatun',
            ),
            426 => 
            array (
                'id' => 957,
                'province_id' => 48,
            'municipality_name' => 'Kabuntalan (Tumbao)',
            ),
            427 => 
            array (
                'id' => 958,
                'province_id' => 48,
                'municipality_name' => 'Mangudadatu',
            ),
            428 => 
            array (
                'id' => 959,
                'province_id' => 48,
                'municipality_name' => 'Northern Kabuntalan',
            ),
            429 => 
            array (
                'id' => 960,
                'province_id' => 48,
                'municipality_name' => 'Paglat',
            ),
            430 => 
            array (
                'id' => 961,
                'province_id' => 48,
                'municipality_name' => 'Parang',
            ),
            431 => 
            array (
                'id' => 962,
                'province_id' => 48,
            'municipality_name' => 'Shariff Aguak (Maganoy)',
            ),
            432 => 
            array (
                'id' => 963,
                'province_id' => 48,
                'municipality_name' => 'South Upi',
            ),
            433 => 
            array (
                'id' => 964,
                'province_id' => 48,
                'municipality_name' => 'Sultan Mastura',
            ),
            434 => 
            array (
                'id' => 965,
                'province_id' => 48,
            'municipality_name' => 'Sultan Sumagka (Talitay)',
            ),
            435 => 
            array (
                'id' => 966,
                'province_id' => 48,
                'municipality_name' => 'Upi',
            ),
            436 => 
            array (
                'id' => 967,
                'province_id' => 48,
                'municipality_name' => 'Barira',
            ),
            437 => 
            array (
                'id' => 968,
                'province_id' => 48,
                'municipality_name' => 'Buluan',
            ),
            438 => 
            array (
                'id' => 969,
                'province_id' => 48,
                'municipality_name' => 'Datu Abdullah Sangki',
            ),
            439 => 
            array (
                'id' => 970,
                'province_id' => 48,
                'municipality_name' => 'Datu Blah T. Sinsuat',
            ),
            440 => 
            array (
                'id' => 971,
                'province_id' => 48,
            'municipality_name' => 'Datu Montawal (Pagagawan)',
            ),
            441 => 
            array (
                'id' => 972,
                'province_id' => 48,
                'municipality_name' => 'Datu Paglas',
            ),
            442 => 
            array (
                'id' => 973,
                'province_id' => 48,
                'municipality_name' => 'Datu Salibo',
            ),
            443 => 
            array (
                'id' => 974,
                'province_id' => 48,
                'municipality_name' => 'Datu Unsay',
            ),
            444 => 
            array (
                'id' => 975,
                'province_id' => 48,
                'municipality_name' => 'Guindulungan',
            ),
            445 => 
            array (
                'id' => 976,
                'province_id' => 48,
                'municipality_name' => 'Mamasapano',
            ),
            446 => 
            array (
                'id' => 977,
                'province_id' => 48,
                'municipality_name' => 'Matanog',
            ),
            447 => 
            array (
                'id' => 978,
                'province_id' => 48,
                'municipality_name' => 'Pagalungan',
            ),
            448 => 
            array (
                'id' => 979,
                'province_id' => 48,
                'municipality_name' => 'Pandag',
            ),
            449 => 
            array (
                'id' => 980,
                'province_id' => 48,
                'municipality_name' => 'Rajah Buayan',
            ),
            450 => 
            array (
                'id' => 981,
                'province_id' => 48,
                'municipality_name' => 'Shariff Saydona Mustapha',
            ),
            451 => 
            array (
                'id' => 982,
                'province_id' => 48,
            'municipality_name' => 'Sultan Kudarat (Nuling)',
            ),
            452 => 
            array (
                'id' => 983,
                'province_id' => 48,
            'municipality_name' => 'Sultan sa Barongis (Lambayong)',
            ),
            453 => 
            array (
                'id' => 984,
                'province_id' => 48,
                'municipality_name' => 'Talayan',
            ),
            454 => 
            array (
                'id' => 985,
                'province_id' => 49,
                'municipality_name' => 'Boac',
            ),
            455 => 
            array (
                'id' => 986,
                'province_id' => 49,
                'municipality_name' => 'Gasan',
            ),
            456 => 
            array (
                'id' => 987,
                'province_id' => 49,
                'municipality_name' => 'Santa Cruz',
            ),
            457 => 
            array (
                'id' => 988,
                'province_id' => 49,
                'municipality_name' => 'Buenavista',
            ),
            458 => 
            array (
                'id' => 989,
                'province_id' => 49,
                'municipality_name' => 'Mogpog',
            ),
            459 => 
            array (
                'id' => 990,
                'province_id' => 49,
                'municipality_name' => 'Torrijos',
            ),
            460 => 
            array (
                'id' => 991,
                'province_id' => 51,
                'municipality_name' => 'Aloran',
            ),
            461 => 
            array (
                'id' => 992,
                'province_id' => 51,
                'municipality_name' => 'Bonifacio',
            ),
            462 => 
            array (
                'id' => 993,
                'province_id' => 51,
                'municipality_name' => 'Clarin',
            ),
            463 => 
            array (
                'id' => 994,
                'province_id' => 51,
            'municipality_name' => 'Don Victoriano Chiongbian (Don Mariano Marcos)',
            ),
            464 => 
            array (
                'id' => 995,
                'province_id' => 51,
                'municipality_name' => 'Lopez Jaena',
            ),
            465 => 
            array (
                'id' => 996,
                'province_id' => 51,
                'municipality_name' => 'Ozamiz',
            ),
            466 => 
            array (
                'id' => 997,
                'province_id' => 51,
                'municipality_name' => 'Plaridel',
            ),
            467 => 
            array (
                'id' => 998,
                'province_id' => 51,
                'municipality_name' => 'Sinacaban',
            ),
            468 => 
            array (
                'id' => 999,
                'province_id' => 51,
                'municipality_name' => 'Tudela',
            ),
            469 => 
            array (
                'id' => 1000,
                'province_id' => 51,
                'municipality_name' => 'Baliangao',
            ),
            470 => 
            array (
                'id' => 1001,
                'province_id' => 51,
                'municipality_name' => 'Calamba',
            ),
            471 => 
            array (
                'id' => 1002,
                'province_id' => 51,
                'municipality_name' => 'Concepcion',
            ),
            472 => 
            array (
                'id' => 1003,
                'province_id' => 51,
                'municipality_name' => 'Jimenez',
            ),
            473 => 
            array (
                'id' => 1004,
                'province_id' => 51,
                'municipality_name' => 'Oroquieta',
            ),
            474 => 
            array (
                'id' => 1005,
                'province_id' => 51,
                'municipality_name' => 'Panaon',
            ),
            475 => 
            array (
                'id' => 1006,
                'province_id' => 51,
                'municipality_name' => 'Sapang Dalaga',
            ),
            476 => 
            array (
                'id' => 1007,
                'province_id' => 51,
                'municipality_name' => 'Tangub',
            ),
            477 => 
            array (
                'id' => 1008,
                'province_id' => 50,
                'municipality_name' => 'Aroroy',
            ),
            478 => 
            array (
                'id' => 1009,
                'province_id' => 50,
                'municipality_name' => 'Balud',
            ),
            479 => 
            array (
                'id' => 1010,
                'province_id' => 50,
                'municipality_name' => 'Cataingan',
            ),
            480 => 
            array (
                'id' => 1011,
                'province_id' => 50,
                'municipality_name' => 'Claveria',
            ),
            481 => 
            array (
                'id' => 1012,
                'province_id' => 50,
                'municipality_name' => 'Esperanza',
            ),
            482 => 
            array (
                'id' => 1013,
                'province_id' => 50,
                'municipality_name' => 'Masbate City',
            ),
            483 => 
            array (
                'id' => 1014,
                'province_id' => 50,
                'municipality_name' => 'Mobo',
            ),
            484 => 
            array (
                'id' => 1015,
                'province_id' => 50,
                'municipality_name' => 'Palanas',
            ),
            485 => 
            array (
                'id' => 1016,
                'province_id' => 50,
                'municipality_name' => 'Placer',
            ),
            486 => 
            array (
                'id' => 1017,
                'province_id' => 50,
                'municipality_name' => 'San Jacinto',
            ),
            487 => 
            array (
                'id' => 1018,
                'province_id' => 50,
                'municipality_name' => 'Uson',
            ),
            488 => 
            array (
                'id' => 1019,
                'province_id' => 50,
                'municipality_name' => 'Baleno',
            ),
            489 => 
            array (
                'id' => 1020,
                'province_id' => 50,
                'municipality_name' => 'Batuan',
            ),
            490 => 
            array (
                'id' => 1021,
                'province_id' => 50,
                'municipality_name' => 'Cawayan',
            ),
            491 => 
            array (
                'id' => 1022,
                'province_id' => 50,
                'municipality_name' => 'Dimasalang',
            ),
            492 => 
            array (
                'id' => 1023,
                'province_id' => 50,
                'municipality_name' => 'Mandaon',
            ),
            493 => 
            array (
                'id' => 1024,
                'province_id' => 50,
                'municipality_name' => 'Milagros',
            ),
            494 => 
            array (
                'id' => 1025,
                'province_id' => 50,
            'municipality_name' => 'Pio V. Corpuz (Limbuhan)',
            ),
            495 => 
            array (
                'id' => 1026,
                'province_id' => 50,
                'municipality_name' => 'San Fernando',
            ),
            496 => 
            array (
                'id' => 1027,
                'province_id' => 50,
                'municipality_name' => 'San Pascual',
            ),
            497 => 
            array (
                'id' => 1028,
                'province_id' => 50,
                'municipality_name' => 'Monreal',
            ),
            498 => 
            array (
                'id' => 1029,
                'province_id' => 52,
                'municipality_name' => 'Alubijid',
            ),
            499 => 
            array (
                'id' => 1030,
                'province_id' => 52,
                'municipality_name' => 'Balingoan',
            ),
        ));
        \DB::table('municipality')->insert(array (
            0 => 
            array (
                'id' => 1031,
                'province_id' => 52,
                'municipality_name' => 'Cagayan de Oro',
            ),
            1 => 
            array (
                'id' => 1032,
                'province_id' => 52,
                'municipality_name' => 'El Salvador',
            ),
            2 => 
            array (
                'id' => 1033,
                'province_id' => 52,
                'municipality_name' => 'Gitagum',
            ),
            3 => 
            array (
                'id' => 1034,
                'province_id' => 52,
                'municipality_name' => 'Jasaan',
            ),
            4 => 
            array (
                'id' => 1035,
                'province_id' => 52,
                'municipality_name' => 'Lagonglong',
            ),
            5 => 
            array (
                'id' => 1036,
                'province_id' => 52,
                'municipality_name' => 'Libertad',
            ),
            6 => 
            array (
                'id' => 1037,
                'province_id' => 52,
            'municipality_name' => 'Magsaysay (Linugos)',
            ),
            7 => 
            array (
                'id' => 1038,
                'province_id' => 52,
                'municipality_name' => 'Medina',
            ),
            8 => 
            array (
                'id' => 1039,
                'province_id' => 52,
                'municipality_name' => 'Opol',
            ),
            9 => 
            array (
                'id' => 1040,
                'province_id' => 52,
                'municipality_name' => 'Sugbongcogon',
            ),
            10 => 
            array (
                'id' => 1041,
                'province_id' => 52,
                'municipality_name' => 'Talisayan',
            ),
            11 => 
            array (
                'id' => 1042,
                'province_id' => 52,
                'municipality_name' => 'Balingasag',
            ),
            12 => 
            array (
                'id' => 1043,
                'province_id' => 52,
                'municipality_name' => 'Binuangan',
            ),
            13 => 
            array (
                'id' => 1044,
                'province_id' => 52,
                'municipality_name' => 'Claveria',
            ),
            14 => 
            array (
                'id' => 1045,
                'province_id' => 52,
                'municipality_name' => 'Gingoog',
            ),
            15 => 
            array (
                'id' => 1046,
                'province_id' => 52,
                'municipality_name' => 'Initao',
            ),
            16 => 
            array (
                'id' => 1047,
                'province_id' => 52,
                'municipality_name' => 'Kinoguitan',
            ),
            17 => 
            array (
                'id' => 1048,
                'province_id' => 52,
                'municipality_name' => 'Laguindingan',
            ),
            18 => 
            array (
                'id' => 1049,
                'province_id' => 52,
                'municipality_name' => 'Lugait',
            ),
            19 => 
            array (
                'id' => 1050,
                'province_id' => 52,
                'municipality_name' => 'Manticao',
            ),
            20 => 
            array (
                'id' => 1051,
                'province_id' => 52,
                'municipality_name' => 'Naawan',
            ),
            21 => 
            array (
                'id' => 1052,
                'province_id' => 52,
                'municipality_name' => 'Salay',
            ),
            22 => 
            array (
                'id' => 1053,
                'province_id' => 52,
                'municipality_name' => 'Tagoloan',
            ),
            23 => 
            array (
                'id' => 1054,
                'province_id' => 52,
                'municipality_name' => 'Villanueva',
            ),
            24 => 
            array (
                'id' => 1055,
                'province_id' => 53,
                'municipality_name' => 'Barlig',
            ),
            25 => 
            array (
                'id' => 1056,
                'province_id' => 53,
                'municipality_name' => 'Besao',
            ),
            26 => 
            array (
                'id' => 1057,
                'province_id' => 53,
                'municipality_name' => 'Natonin',
            ),
            27 => 
            array (
                'id' => 1058,
                'province_id' => 53,
                'municipality_name' => 'Sabangan',
            ),
            28 => 
            array (
                'id' => 1059,
                'province_id' => 53,
                'municipality_name' => 'Sagada',
            ),
            29 => 
            array (
                'id' => 1060,
                'province_id' => 53,
                'municipality_name' => 'Bauko',
            ),
            30 => 
            array (
                'id' => 1061,
                'province_id' => 53,
                'municipality_name' => 'Bontoc',
            ),
            31 => 
            array (
                'id' => 1062,
                'province_id' => 53,
                'municipality_name' => 'Paracelis',
            ),
            32 => 
            array (
                'id' => 1063,
                'province_id' => 53,
                'municipality_name' => 'Sadanga',
            ),
            33 => 
            array (
                'id' => 1064,
                'province_id' => 53,
                'municipality_name' => 'Tadian',
            ),
            34 => 
            array (
                'id' => 1065,
                'province_id' => 54,
                'municipality_name' => 'Mandaluyong',
            ),
            35 => 
            array (
                'id' => 1066,
                'province_id' => 54,
                'municipality_name' => 'Pasig',
            ),
            36 => 
            array (
                'id' => 1067,
                'province_id' => 54,
                'municipality_name' => 'San Juan',
            ),
            37 => 
            array (
                'id' => 1068,
                'province_id' => 54,
                'municipality_name' => 'Marikina',
            ),
            38 => 
            array (
                'id' => 1069,
                'province_id' => 54,
                'municipality_name' => 'Quezon City',
            ),
            39 => 
            array (
                'id' => 1070,
                'province_id' => 54,
                'municipality_name' => 'Caloocan',
            ),
            40 => 
            array (
                'id' => 1071,
                'province_id' => 54,
                'municipality_name' => 'Navotas',
            ),
            41 => 
            array (
                'id' => 1072,
                'province_id' => 54,
                'municipality_name' => 'Malabon',
            ),
            42 => 
            array (
                'id' => 1073,
                'province_id' => 54,
                'municipality_name' => 'Valenzuela',
            ),
            43 => 
            array (
                'id' => 1074,
                'province_id' => 54,
                'municipality_name' => 'Las Pi&ntilde;as',
            ),
            44 => 
            array (
                'id' => 1075,
                'province_id' => 54,
                'municipality_name' => 'Muntinlupa',
            ),
            45 => 
            array (
                'id' => 1076,
                'province_id' => 54,
                'municipality_name' => 'Pasay',
            ),
            46 => 
            array (
                'id' => 1077,
                'province_id' => 54,
                'municipality_name' => 'Taguia',
            ),
            47 => 
            array (
                'id' => 1078,
                'province_id' => 54,
                'municipality_name' => 'Makati',
            ),
            48 => 
            array (
                'id' => 1079,
                'province_id' => 54,
                'municipality_name' => 'Para&ntilde;aque',
            ),
            49 => 
            array (
                'id' => 1080,
                'province_id' => 54,
                'municipality_name' => 'Pateros',
            ),
            50 => 
            array (
                'id' => 1081,
                'province_id' => 54,
                'municipality_name' => 'Manila',
            ),
            51 => 
            array (
                'id' => 1082,
                'province_id' => 55,
                'municipality_name' => 'Bacolod',
            ),
            52 => 
            array (
                'id' => 1083,
                'province_id' => 55,
                'municipality_name' => 'Binalbagan',
            ),
            53 => 
            array (
                'id' => 1084,
                'province_id' => 55,
                'municipality_name' => 'Calatrava',
            ),
            54 => 
            array (
                'id' => 1085,
                'province_id' => 55,
                'municipality_name' => 'Cauayan',
            ),
            55 => 
            array (
                'id' => 1086,
                'province_id' => 55,
                'municipality_name' => 'Escalante',
            ),
            56 => 
            array (
                'id' => 1087,
                'province_id' => 55,
                'municipality_name' => 'Hinigaran',
            ),
            57 => 
            array (
                'id' => 1088,
                'province_id' => 55,
                'municipality_name' => 'Ilog',
            ),
            58 => 
            array (
                'id' => 1089,
                'province_id' => 55,
                'municipality_name' => 'Kabankalan',
            ),
            59 => 
            array (
                'id' => 1090,
                'province_id' => 55,
                'municipality_name' => 'La Castellana',
            ),
            60 => 
            array (
                'id' => 1091,
                'province_id' => 55,
            'municipality_name' => 'Moises Padilla (Magallon)',
            ),
            61 => 
            array (
                'id' => 1092,
                'province_id' => 55,
                'municipality_name' => 'Pontevedra',
            ),
            62 => 
            array (
                'id' => 1093,
                'province_id' => 55,
                'municipality_name' => 'Sagay',
            ),
            63 => 
            array (
                'id' => 1094,
                'province_id' => 55,
                'municipality_name' => 'San Carlos',
            ),
            64 => 
            array (
                'id' => 1095,
                'province_id' => 55,
                'municipality_name' => 'Silay',
            ),
            65 => 
            array (
                'id' => 1096,
                'province_id' => 55,
                'municipality_name' => 'Talisay',
            ),
            66 => 
            array (
                'id' => 1097,
                'province_id' => 55,
                'municipality_name' => 'Valladolid',
            ),
            67 => 
            array (
                'id' => 1098,
                'province_id' => 55,
                'municipality_name' => 'Bago',
            ),
            68 => 
            array (
                'id' => 1099,
                'province_id' => 55,
                'municipality_name' => 'Cadiz',
            ),
            69 => 
            array (
                'id' => 1100,
                'province_id' => 55,
                'municipality_name' => 'Candoni',
            ),
            70 => 
            array (
                'id' => 1101,
                'province_id' => 55,
            'municipality_name' => 'Enrique B. Magalona (Saravia)',
            ),
            71 => 
            array (
                'id' => 1102,
                'province_id' => 55,
                'municipality_name' => 'Himamaylan',
            ),
            72 => 
            array (
                'id' => 1103,
                'province_id' => 55,
            'municipality_name' => 'Hinoba-an (Asia)',
            ),
            73 => 
            array (
                'id' => 1104,
                'province_id' => 55,
                'municipality_name' => 'Isabela',
            ),
            74 => 
            array (
                'id' => 1105,
                'province_id' => 55,
                'municipality_name' => 'La Carlota',
            ),
            75 => 
            array (
                'id' => 1106,
                'province_id' => 55,
                'municipality_name' => 'Manapla',
            ),
            76 => 
            array (
                'id' => 1107,
                'province_id' => 55,
                'municipality_name' => 'Murcia',
            ),
            77 => 
            array (
                'id' => 1108,
                'province_id' => 55,
                'municipality_name' => 'Pulupandan',
            ),
            78 => 
            array (
                'id' => 1109,
                'province_id' => 55,
                'municipality_name' => 'Salvador Benedicto',
            ),
            79 => 
            array (
                'id' => 1110,
                'province_id' => 55,
                'municipality_name' => 'San Enrique',
            ),
            80 => 
            array (
                'id' => 1111,
                'province_id' => 55,
                'municipality_name' => 'Sipalay',
            ),
            81 => 
            array (
                'id' => 1112,
                'province_id' => 55,
                'municipality_name' => 'Toboso',
            ),
            82 => 
            array (
                'id' => 1113,
                'province_id' => 55,
                'municipality_name' => 'Victorias',
            ),
            83 => 
            array (
                'id' => 1114,
                'province_id' => 56,
                'municipality_name' => 'Vallehermoso',
            ),
            84 => 
            array (
                'id' => 1115,
                'province_id' => 56,
            'municipality_name' => 'Amlan (Ayuquitan)',
            ),
            85 => 
            array (
                'id' => 1116,
                'province_id' => 56,
                'municipality_name' => 'Bacong',
            ),
            86 => 
            array (
                'id' => 1117,
                'province_id' => 56,
                'municipality_name' => 'Basay',
            ),
            87 => 
            array (
                'id' => 1118,
                'province_id' => 56,
            'municipality_name' => 'Bindoy (Payabon)',
            ),
            88 => 
            array (
                'id' => 1119,
                'province_id' => 56,
                'municipality_name' => 'Dauin',
            ),
            89 => 
            array (
                'id' => 1120,
                'province_id' => 56,
                'municipality_name' => 'Guihulngan',
            ),
            90 => 
            array (
                'id' => 1121,
                'province_id' => 56,
                'municipality_name' => 'La Libertad',
            ),
            91 => 
            array (
                'id' => 1122,
                'province_id' => 56,
                'municipality_name' => 'Manjuyod',
            ),
            92 => 
            array (
                'id' => 1123,
                'province_id' => 56,
                'municipality_name' => 'San Jose',
            ),
            93 => 
            array (
                'id' => 1124,
                'province_id' => 56,
                'municipality_name' => 'Siaton',
            ),
            94 => 
            array (
                'id' => 1125,
                'province_id' => 56,
                'municipality_name' => 'Tanjay',
            ),
            95 => 
            array (
                'id' => 1126,
                'province_id' => 56,
            'municipality_name' => 'Valencia (Luzurriaga)',
            ),
            96 => 
            array (
                'id' => 1127,
                'province_id' => 56,
                'municipality_name' => 'Zamboanguita',
            ),
            97 => 
            array (
                'id' => 1128,
                'province_id' => 56,
                'municipality_name' => 'Ayungon',
            ),
            98 => 
            array (
                'id' => 1129,
                'province_id' => 56,
                'municipality_name' => 'Bais',
            ),
            99 => 
            array (
                'id' => 1130,
                'province_id' => 56,
            'municipality_name' => 'Bayawan (Tulong)',
            ),
            100 => 
            array (
                'id' => 1131,
                'province_id' => 56,
                'municipality_name' => 'Canlaon',
            ),
            101 => 
            array (
                'id' => 1132,
                'province_id' => 56,
                'municipality_name' => 'Dumaguete',
            ),
            102 => 
            array (
                'id' => 1133,
                'province_id' => 56,
                'municipality_name' => 'Jimalalud',
            ),
            103 => 
            array (
                'id' => 1134,
                'province_id' => 56,
                'municipality_name' => 'Mabinay',
            ),
            104 => 
            array (
                'id' => 1135,
                'province_id' => 56,
                'municipality_name' => 'Pamplona',
            ),
            105 => 
            array (
                'id' => 1136,
                'province_id' => 56,
                'municipality_name' => 'Santa Catalina',
            ),
            106 => 
            array (
                'id' => 1137,
                'province_id' => 56,
                'municipality_name' => 'Sibulan',
            ),
            107 => 
            array (
                'id' => 1138,
                'province_id' => 56,
                'municipality_name' => 'Tayasan',
            ),
            108 => 
            array (
                'id' => 1139,
                'province_id' => 57,
                'municipality_name' => 'Allen',
            ),
            109 => 
            array (
                'id' => 1140,
                'province_id' => 57,
                'municipality_name' => 'Bobon',
            ),
            110 => 
            array (
                'id' => 1141,
                'province_id' => 57,
                'municipality_name' => 'Catarman',
            ),
            111 => 
            array (
                'id' => 1142,
                'province_id' => 57,
                'municipality_name' => 'Gamay',
            ),
            112 => 
            array (
                'id' => 1143,
                'province_id' => 57,
                'municipality_name' => 'Lapinig',
            ),
            113 => 
            array (
                'id' => 1144,
                'province_id' => 57,
                'municipality_name' => 'Lavezares',
            ),
            114 => 
            array (
                'id' => 1145,
                'province_id' => 57,
                'municipality_name' => 'Mapanas',
            ),
            115 => 
            array (
                'id' => 1146,
                'province_id' => 57,
                'municipality_name' => 'Palapag',
            ),
            116 => 
            array (
                'id' => 1147,
                'province_id' => 57,
                'municipality_name' => 'Rosario',
            ),
            117 => 
            array (
                'id' => 1148,
                'province_id' => 57,
                'municipality_name' => 'San Isidro',
            ),
            118 => 
            array (
                'id' => 1149,
                'province_id' => 57,
                'municipality_name' => 'San Roque',
            ),
            119 => 
            array (
                'id' => 1150,
                'province_id' => 57,
                'municipality_name' => 'Silvino Lobos',
            ),
            120 => 
            array (
                'id' => 1151,
                'province_id' => 57,
                'municipality_name' => 'Biri',
            ),
            121 => 
            array (
                'id' => 1152,
                'province_id' => 57,
                'municipality_name' => 'Capul',
            ),
            122 => 
            array (
                'id' => 1153,
                'province_id' => 57,
                'municipality_name' => 'Catubig',
            ),
            123 => 
            array (
                'id' => 1154,
                'province_id' => 57,
                'municipality_name' => 'Laoang',
            ),
            124 => 
            array (
                'id' => 1155,
                'province_id' => 57,
                'municipality_name' => 'Las Navas',
            ),
            125 => 
            array (
                'id' => 1156,
                'province_id' => 57,
                'municipality_name' => 'Lope de Vega',
            ),
            126 => 
            array (
                'id' => 1157,
                'province_id' => 57,
                'municipality_name' => 'Mondragon',
            ),
            127 => 
            array (
                'id' => 1158,
                'province_id' => 57,
                'municipality_name' => 'Pambujan',
            ),
            128 => 
            array (
                'id' => 1159,
                'province_id' => 57,
                'municipality_name' => 'San Antonio',
            ),
            129 => 
            array (
                'id' => 1160,
                'province_id' => 57,
                'municipality_name' => 'San Jose',
            ),
            130 => 
            array (
                'id' => 1161,
                'province_id' => 57,
                'municipality_name' => 'San Vicente',
            ),
            131 => 
            array (
                'id' => 1162,
                'province_id' => 57,
                'municipality_name' => 'Victoria',
            ),
            132 => 
            array (
                'id' => 1163,
                'province_id' => 58,
                'municipality_name' => 'Zaragoza',
            ),
            133 => 
            array (
                'id' => 1164,
                'province_id' => 58,
                'municipality_name' => 'Aliaga',
            ),
            134 => 
            array (
                'id' => 1165,
                'province_id' => 58,
                'municipality_name' => 'Cabanatuan',
            ),
            135 => 
            array (
                'id' => 1166,
                'province_id' => 58,
                'municipality_name' => 'Carranglan',
            ),
            136 => 
            array (
                'id' => 1167,
                'province_id' => 58,
            'municipality_name' => 'Gabaldon (Bitulok & Sabani)',
            ),
            137 => 
            array (
                'id' => 1168,
                'province_id' => 58,
                'municipality_name' => 'General Mamerto Natividad',
            ),
            138 => 
            array (
                'id' => 1169,
                'province_id' => 58,
                'municipality_name' => 'Guimba',
            ),
            139 => 
            array (
                'id' => 1170,
                'province_id' => 58,
                'municipality_name' => 'Laur',
            ),
            140 => 
            array (
                'id' => 1171,
                'province_id' => 58,
                'municipality_name' => 'Llanera',
            ),
            141 => 
            array (
                'id' => 1172,
                'province_id' => 58,
                'municipality_name' => 'Mu&ntilde;oz',
            ),
            142 => 
            array (
                'id' => 1173,
                'province_id' => 58,
                'municipality_name' => 'Palayan',
            ),
            143 => 
            array (
                'id' => 1174,
                'province_id' => 58,
                'municipality_name' => 'Pe&ntilde;aranda',
            ),
            144 => 
            array (
                'id' => 1175,
                'province_id' => 58,
                'municipality_name' => 'Rizal',
            ),
            145 => 
            array (
                'id' => 1176,
                'province_id' => 58,
                'municipality_name' => 'San Isidro',
            ),
            146 => 
            array (
                'id' => 1177,
                'province_id' => 58,
                'municipality_name' => 'San Leonardo',
            ),
            147 => 
            array (
                'id' => 1178,
                'province_id' => 58,
                'municipality_name' => 'Santo Domingo',
            ),
            148 => 
            array (
                'id' => 1179,
                'province_id' => 58,
                'municipality_name' => 'Talugtug',
            ),
            149 => 
            array (
                'id' => 1180,
                'province_id' => 58,
                'municipality_name' => 'Bongabon',
            ),
            150 => 
            array (
                'id' => 1181,
                'province_id' => 58,
                'municipality_name' => 'Cabiao',
            ),
            151 => 
            array (
                'id' => 1182,
                'province_id' => 58,
                'municipality_name' => 'Cuyapo',
            ),
            152 => 
            array (
                'id' => 1183,
                'province_id' => 58,
                'municipality_name' => 'Gapan',
            ),
            153 => 
            array (
                'id' => 1184,
                'province_id' => 58,
            'municipality_name' => 'General Tinio (Papaya)',
            ),
            154 => 
            array (
                'id' => 1185,
                'province_id' => 58,
                'municipality_name' => 'Jaen',
            ),
            155 => 
            array (
                'id' => 1186,
                'province_id' => 58,
                'municipality_name' => 'Licab',
            ),
            156 => 
            array (
                'id' => 1187,
                'province_id' => 58,
                'municipality_name' => 'Lupao',
            ),
            157 => 
            array (
                'id' => 1188,
                'province_id' => 58,
                'municipality_name' => 'Nampicuan',
            ),
            158 => 
            array (
                'id' => 1189,
                'province_id' => 58,
                'municipality_name' => 'Pantabangan',
            ),
            159 => 
            array (
                'id' => 1190,
                'province_id' => 58,
                'municipality_name' => 'Quezon',
            ),
            160 => 
            array (
                'id' => 1191,
                'province_id' => 58,
                'municipality_name' => 'San Antonio',
            ),
            161 => 
            array (
                'id' => 1192,
                'province_id' => 58,
                'municipality_name' => 'San Jose',
            ),
            162 => 
            array (
                'id' => 1193,
                'province_id' => 58,
                'municipality_name' => 'Santa Rosa',
            ),
            163 => 
            array (
                'id' => 1194,
                'province_id' => 58,
                'municipality_name' => 'Talavera',
            ),
            164 => 
            array (
                'id' => 1195,
                'province_id' => 59,
                'municipality_name' => 'Alfonso Casta&ntilde;eda',
            ),
            165 => 
            array (
                'id' => 1196,
                'province_id' => 59,
                'municipality_name' => 'Aritao',
            ),
            166 => 
            array (
                'id' => 1197,
                'province_id' => 59,
                'municipality_name' => 'Bambang',
            ),
            167 => 
            array (
                'id' => 1198,
                'province_id' => 59,
                'municipality_name' => 'Diadi',
            ),
            168 => 
            array (
                'id' => 1199,
                'province_id' => 59,
                'municipality_name' => 'Dupax del Sur',
            ),
            169 => 
            array (
                'id' => 1200,
                'province_id' => 59,
                'municipality_name' => 'Kayapa',
            ),
            170 => 
            array (
                'id' => 1201,
                'province_id' => 59,
            'municipality_name' => 'Santa Fe (Imugan)',
            ),
            171 => 
            array (
                'id' => 1202,
                'province_id' => 59,
            'municipality_name' => 'Villaverde (Ibung)',
            ),
            172 => 
            array (
                'id' => 1203,
                'province_id' => 59,
                'municipality_name' => 'Ambaguio',
            ),
            173 => 
            array (
                'id' => 1204,
                'province_id' => 59,
                'municipality_name' => 'Bagabag',
            ),
            174 => 
            array (
                'id' => 1205,
                'province_id' => 59,
                'municipality_name' => 'Bayombong',
            ),
            175 => 
            array (
                'id' => 1206,
                'province_id' => 59,
                'municipality_name' => 'Dupax del Norte',
            ),
            176 => 
            array (
                'id' => 1207,
                'province_id' => 59,
                'municipality_name' => 'Kasibu',
            ),
            177 => 
            array (
                'id' => 1208,
                'province_id' => 59,
                'municipality_name' => 'Quezon',
            ),
            178 => 
            array (
                'id' => 1209,
                'province_id' => 59,
                'municipality_name' => 'Solano',
            ),
            179 => 
            array (
                'id' => 1210,
                'province_id' => 60,
                'municipality_name' => 'San Jose',
            ),
            180 => 
            array (
                'id' => 1211,
                'province_id' => 60,
                'municipality_name' => 'Abra de Ilog',
            ),
            181 => 
            array (
                'id' => 1212,
                'province_id' => 60,
                'municipality_name' => 'Looc',
            ),
            182 => 
            array (
                'id' => 1213,
                'province_id' => 60,
                'municipality_name' => 'Magsaysay',
            ),
            183 => 
            array (
                'id' => 1214,
                'province_id' => 60,
                'municipality_name' => 'Paluan',
            ),
            184 => 
            array (
                'id' => 1215,
                'province_id' => 60,
                'municipality_name' => 'Sablayan',
            ),
            185 => 
            array (
                'id' => 1216,
                'province_id' => 60,
                'municipality_name' => 'Santa Cruz',
            ),
            186 => 
            array (
                'id' => 1217,
                'province_id' => 60,
                'municipality_name' => 'Calintaan',
            ),
            187 => 
            array (
                'id' => 1218,
                'province_id' => 60,
                'municipality_name' => 'Lubang',
            ),
            188 => 
            array (
                'id' => 1219,
                'province_id' => 60,
                'municipality_name' => 'Mamburao',
            ),
            189 => 
            array (
                'id' => 1220,
                'province_id' => 60,
                'municipality_name' => 'Rizal',
            ),
            190 => 
            array (
                'id' => 1221,
                'province_id' => 61,
                'municipality_name' => 'Aborlan',
            ),
            191 => 
            array (
                'id' => 1222,
                'province_id' => 61,
                'municipality_name' => 'Araceli',
            ),
            192 => 
            array (
                'id' => 1223,
                'province_id' => 61,
                'municipality_name' => 'Bataraza',
            ),
            193 => 
            array (
                'id' => 1224,
                'province_id' => 61,
                'municipality_name' => 'Busuanga',
            ),
            194 => 
            array (
                'id' => 1225,
                'province_id' => 61,
                'municipality_name' => 'Coron',
            ),
            195 => 
            array (
                'id' => 1226,
                'province_id' => 61,
                'municipality_name' => 'Cuyo',
            ),
            196 => 
            array (
                'id' => 1227,
                'province_id' => 61,
            'municipality_name' => 'El Nido (Bacuit)',
            ),
            197 => 
            array (
                'id' => 1228,
                'province_id' => 61,
                'municipality_name' => 'Linapacan',
            ),
            198 => 
            array (
                'id' => 1229,
                'province_id' => 61,
                'municipality_name' => 'Narra',
            ),
            199 => 
            array (
                'id' => 1230,
                'province_id' => 61,
                'municipality_name' => 'Quezon',
            ),
            200 => 
            array (
                'id' => 1231,
                'province_id' => 61,
                'municipality_name' => 'Roxas',
            ),
            201 => 
            array (
                'id' => 1232,
                'province_id' => 61,
                'municipality_name' => 'Sofronio Espa&ntilde;ola',
            ),
            202 => 
            array (
                'id' => 1233,
                'province_id' => 61,
                'municipality_name' => 'Agutaya',
            ),
            203 => 
            array (
                'id' => 1234,
                'province_id' => 61,
                'municipality_name' => 'Balabac',
            ),
            204 => 
            array (
                'id' => 1235,
                'province_id' => 61,
                'municipality_name' => 'Brooke\'s Point',
            ),
            205 => 
            array (
                'id' => 1236,
                'province_id' => 61,
                'municipality_name' => 'Cagayancillo',
            ),
            206 => 
            array (
                'id' => 1237,
                'province_id' => 61,
                'municipality_name' => 'Culion',
            ),
            207 => 
            array (
                'id' => 1238,
                'province_id' => 61,
                'municipality_name' => 'Dumaran',
            ),
            208 => 
            array (
                'id' => 1239,
                'province_id' => 61,
                'municipality_name' => 'Kalayaan',
            ),
            209 => 
            array (
                'id' => 1240,
                'province_id' => 61,
                'municipality_name' => 'Magsaysay',
            ),
            210 => 
            array (
                'id' => 1241,
                'province_id' => 61,
                'municipality_name' => 'Puerto Princesa',
            ),
            211 => 
            array (
                'id' => 1242,
                'province_id' => 61,
            'municipality_name' => 'Rizal (Marcos)',
            ),
            212 => 
            array (
                'id' => 1243,
                'province_id' => 61,
                'municipality_name' => 'San Vicente',
            ),
            213 => 
            array (
                'id' => 1244,
                'province_id' => 61,
                'municipality_name' => 'Taytay',
            ),
            214 => 
            array (
                'id' => 1245,
                'province_id' => 62,
                'municipality_name' => 'Sasmuan',
            ),
            215 => 
            array (
                'id' => 1246,
                'province_id' => 62,
                'municipality_name' => 'Angeles',
            ),
            216 => 
            array (
                'id' => 1247,
                'province_id' => 62,
                'municipality_name' => 'Arayat',
            ),
            217 => 
            array (
                'id' => 1248,
                'province_id' => 62,
                'municipality_name' => 'Candaba',
            ),
            218 => 
            array (
                'id' => 1249,
                'province_id' => 62,
                'municipality_name' => 'Guagua',
            ),
            219 => 
            array (
                'id' => 1250,
                'province_id' => 62,
                'municipality_name' => 'Mabalacat',
            ),
            220 => 
            array (
                'id' => 1251,
                'province_id' => 62,
                'municipality_name' => 'Magalang',
            ),
            221 => 
            array (
                'id' => 1252,
                'province_id' => 62,
                'municipality_name' => 'Mexico',
            ),
            222 => 
            array (
                'id' => 1253,
                'province_id' => 62,
                'municipality_name' => 'Porac',
            ),
            223 => 
            array (
                'id' => 1254,
                'province_id' => 62,
                'municipality_name' => 'San Luis',
            ),
            224 => 
            array (
                'id' => 1255,
                'province_id' => 62,
                'municipality_name' => 'Santa Ana',
            ),
            225 => 
            array (
                'id' => 1256,
                'province_id' => 62,
                'municipality_name' => 'Santo Tomas',
            ),
            226 => 
            array (
                'id' => 1257,
                'province_id' => 62,
                'municipality_name' => 'Apalit',
            ),
            227 => 
            array (
                'id' => 1258,
                'province_id' => 62,
                'municipality_name' => 'Bacolor',
            ),
            228 => 
            array (
                'id' => 1259,
                'province_id' => 62,
                'municipality_name' => 'Floridablanca',
            ),
            229 => 
            array (
                'id' => 1260,
                'province_id' => 62,
                'municipality_name' => 'Lubao',
            ),
            230 => 
            array (
                'id' => 1261,
                'province_id' => 62,
                'municipality_name' => 'Macabebe',
            ),
            231 => 
            array (
                'id' => 1262,
                'province_id' => 62,
                'municipality_name' => 'Masantol',
            ),
            232 => 
            array (
                'id' => 1263,
                'province_id' => 62,
                'municipality_name' => 'Minalin',
            ),
            233 => 
            array (
                'id' => 1264,
                'province_id' => 62,
                'municipality_name' => 'San Fernando',
            ),
            234 => 
            array (
                'id' => 1265,
                'province_id' => 62,
                'municipality_name' => 'San Simon',
            ),
            235 => 
            array (
                'id' => 1266,
                'province_id' => 62,
                'municipality_name' => 'Santa Rita',
            ),
            236 => 
            array (
                'id' => 1267,
                'province_id' => 63,
                'municipality_name' => 'Agno',
            ),
            237 => 
            array (
                'id' => 1268,
                'province_id' => 63,
                'municipality_name' => 'Alaminos',
            ),
            238 => 
            array (
                'id' => 1269,
                'province_id' => 63,
                'municipality_name' => 'Anda',
            ),
            239 => 
            array (
                'id' => 1270,
                'province_id' => 63,
                'municipality_name' => 'Balungao',
            ),
            240 => 
            array (
                'id' => 1271,
                'province_id' => 63,
                'municipality_name' => 'Basista',
            ),
            241 => 
            array (
                'id' => 1272,
                'province_id' => 63,
                'municipality_name' => 'Bayambang',
            ),
            242 => 
            array (
                'id' => 1273,
                'province_id' => 63,
                'municipality_name' => 'Binmaley',
            ),
            243 => 
            array (
                'id' => 1274,
                'province_id' => 63,
                'municipality_name' => 'Bugallon',
            ),
            244 => 
            array (
                'id' => 1275,
                'province_id' => 63,
                'municipality_name' => 'Calasiao',
            ),
            245 => 
            array (
                'id' => 1276,
                'province_id' => 63,
                'municipality_name' => 'Dasol',
            ),
            246 => 
            array (
                'id' => 1277,
                'province_id' => 63,
                'municipality_name' => 'Labrador',
            ),
            247 => 
            array (
                'id' => 1278,
                'province_id' => 63,
                'municipality_name' => 'Lingayen',
            ),
            248 => 
            array (
                'id' => 1279,
                'province_id' => 63,
                'municipality_name' => 'Malasiqui',
            ),
            249 => 
            array (
                'id' => 1280,
                'province_id' => 63,
                'municipality_name' => 'Mangaldan',
            ),
            250 => 
            array (
                'id' => 1281,
                'province_id' => 63,
                'municipality_name' => 'Mapandan',
            ),
            251 => 
            array (
                'id' => 1282,
                'province_id' => 63,
                'municipality_name' => 'Pozorrubio',
            ),
            252 => 
            array (
                'id' => 1283,
                'province_id' => 63,
                'municipality_name' => 'San Carlos',
            ),
            253 => 
            array (
                'id' => 1284,
                'province_id' => 63,
                'municipality_name' => 'San Jacinto',
            ),
            254 => 
            array (
                'id' => 1285,
                'province_id' => 63,
                'municipality_name' => 'San Nicolas',
            ),
            255 => 
            array (
                'id' => 1286,
                'province_id' => 63,
                'municipality_name' => 'Santa Barbara',
            ),
            256 => 
            array (
                'id' => 1287,
                'province_id' => 63,
                'municipality_name' => 'Santo Tomas',
            ),
            257 => 
            array (
                'id' => 1288,
                'province_id' => 63,
                'municipality_name' => 'Sual',
            ),
            258 => 
            array (
                'id' => 1289,
                'province_id' => 63,
                'municipality_name' => 'Umingan',
            ),
            259 => 
            array (
                'id' => 1290,
                'province_id' => 63,
                'municipality_name' => 'Urdaneta',
            ),
            260 => 
            array (
                'id' => 1291,
                'province_id' => 63,
                'municipality_name' => 'Aguilar',
            ),
            261 => 
            array (
                'id' => 1292,
                'province_id' => 63,
                'municipality_name' => 'Alcala',
            ),
            262 => 
            array (
                'id' => 1293,
                'province_id' => 63,
                'municipality_name' => 'Asingan',
            ),
            263 => 
            array (
                'id' => 1294,
                'province_id' => 63,
                'municipality_name' => 'Bani',
            ),
            264 => 
            array (
                'id' => 1295,
                'province_id' => 63,
                'municipality_name' => 'Bautista',
            ),
            265 => 
            array (
                'id' => 1296,
                'province_id' => 63,
                'municipality_name' => 'Binalonan',
            ),
            266 => 
            array (
                'id' => 1297,
                'province_id' => 63,
                'municipality_name' => 'Bolinao',
            ),
            267 => 
            array (
                'id' => 1298,
                'province_id' => 63,
                'municipality_name' => 'Burgos',
            ),
            268 => 
            array (
                'id' => 1299,
                'province_id' => 63,
                'municipality_name' => 'Dagupan',
            ),
            269 => 
            array (
                'id' => 1300,
                'province_id' => 63,
                'municipality_name' => 'Infanta',
            ),
            270 => 
            array (
                'id' => 1301,
                'province_id' => 63,
                'municipality_name' => 'Laoac',
            ),
            271 => 
            array (
                'id' => 1302,
                'province_id' => 63,
                'municipality_name' => 'Mabini',
            ),
            272 => 
            array (
                'id' => 1303,
                'province_id' => 63,
                'municipality_name' => 'Manaoag',
            ),
            273 => 
            array (
                'id' => 1304,
                'province_id' => 63,
                'municipality_name' => 'Mangatarem',
            ),
            274 => 
            array (
                'id' => 1305,
                'province_id' => 63,
                'municipality_name' => 'Natividad',
            ),
            275 => 
            array (
                'id' => 1306,
                'province_id' => 63,
                'municipality_name' => 'Rosales',
            ),
            276 => 
            array (
                'id' => 1307,
                'province_id' => 63,
                'municipality_name' => 'San Fabian',
            ),
            277 => 
            array (
                'id' => 1308,
                'province_id' => 63,
                'municipality_name' => 'San Manuel',
            ),
            278 => 
            array (
                'id' => 1309,
                'province_id' => 63,
                'municipality_name' => 'San Quintin',
            ),
            279 => 
            array (
                'id' => 1310,
                'province_id' => 63,
                'municipality_name' => 'Santa Maria',
            ),
            280 => 
            array (
                'id' => 1311,
                'province_id' => 63,
                'municipality_name' => 'Sison',
            ),
            281 => 
            array (
                'id' => 1312,
                'province_id' => 63,
                'municipality_name' => 'Tayug',
            ),
            282 => 
            array (
                'id' => 1313,
                'province_id' => 63,
                'municipality_name' => 'Urbiztondo',
            ),
            283 => 
            array (
                'id' => 1314,
                'province_id' => 63,
                'municipality_name' => 'Villasis',
            ),
            284 => 
            array (
                'id' => 1315,
                'province_id' => 64,
                'municipality_name' => 'Agdangan',
            ),
            285 => 
            array (
                'id' => 1316,
                'province_id' => 64,
                'municipality_name' => 'Atimonan',
            ),
            286 => 
            array (
                'id' => 1317,
                'province_id' => 64,
                'municipality_name' => 'Burdeos',
            ),
            287 => 
            array (
                'id' => 1318,
                'province_id' => 64,
                'municipality_name' => 'Candelaria',
            ),
            288 => 
            array (
                'id' => 1319,
                'province_id' => 64,
                'municipality_name' => 'Dolores',
            ),
            289 => 
            array (
                'id' => 1320,
                'province_id' => 64,
                'municipality_name' => 'General Nakar',
            ),
            290 => 
            array (
                'id' => 1321,
                'province_id' => 64,
                'municipality_name' => 'Gumaca',
            ),
            291 => 
            array (
                'id' => 1322,
                'province_id' => 64,
                'municipality_name' => 'Jomalig',
            ),
            292 => 
            array (
                'id' => 1323,
                'province_id' => 64,
                'municipality_name' => 'Lucban',
            ),
            293 => 
            array (
                'id' => 1324,
                'province_id' => 64,
                'municipality_name' => 'Macalelon',
            ),
            294 => 
            array (
                'id' => 1325,
                'province_id' => 64,
                'municipality_name' => 'Mulanay',
            ),
            295 => 
            array (
                'id' => 1326,
                'province_id' => 64,
                'municipality_name' => 'Pagbilao',
            ),
            296 => 
            array (
                'id' => 1327,
                'province_id' => 64,
                'municipality_name' => 'Patnanungan',
            ),
            297 => 
            array (
                'id' => 1328,
                'province_id' => 64,
                'municipality_name' => 'Pitogo',
            ),
            298 => 
            array (
                'id' => 1329,
                'province_id' => 64,
                'municipality_name' => 'Polillo',
            ),
            299 => 
            array (
                'id' => 1330,
                'province_id' => 64,
                'municipality_name' => 'Real',
            ),
            300 => 
            array (
                'id' => 1331,
                'province_id' => 64,
                'municipality_name' => 'San Andres',
            ),
            301 => 
            array (
                'id' => 1332,
                'province_id' => 64,
            'municipality_name' => 'San Francisco (Aurora)',
            ),
            302 => 
            array (
                'id' => 1333,
                'province_id' => 64,
                'municipality_name' => 'Sariaya',
            ),
            303 => 
            array (
                'id' => 1334,
                'province_id' => 64,
                'municipality_name' => 'Tayabas',
            ),
            304 => 
            array (
                'id' => 1335,
                'province_id' => 64,
                'municipality_name' => 'Unisan',
            ),
            305 => 
            array (
                'id' => 1336,
                'province_id' => 64,
                'municipality_name' => 'Alabat',
            ),
            306 => 
            array (
                'id' => 1337,
                'province_id' => 64,
                'municipality_name' => 'Buenavista',
            ),
            307 => 
            array (
                'id' => 1338,
                'province_id' => 64,
                'municipality_name' => 'Calauag',
            ),
            308 => 
            array (
                'id' => 1339,
                'province_id' => 64,
                'municipality_name' => 'Catanauan',
            ),
            309 => 
            array (
                'id' => 1340,
                'province_id' => 64,
                'municipality_name' => 'General Luna',
            ),
            310 => 
            array (
                'id' => 1341,
                'province_id' => 64,
                'municipality_name' => 'Guinayangan',
            ),
            311 => 
            array (
                'id' => 1342,
                'province_id' => 64,
                'municipality_name' => 'Infanta',
            ),
            312 => 
            array (
                'id' => 1343,
                'province_id' => 64,
                'municipality_name' => 'Lopez',
            ),
            313 => 
            array (
                'id' => 1344,
                'province_id' => 64,
                'municipality_name' => 'Lucena',
            ),
            314 => 
            array (
                'id' => 1345,
                'province_id' => 64,
                'municipality_name' => 'Mauban',
            ),
            315 => 
            array (
                'id' => 1346,
                'province_id' => 64,
                'municipality_name' => 'Padre Burgos',
            ),
            316 => 
            array (
                'id' => 1347,
                'province_id' => 64,
                'municipality_name' => 'Panukulan',
            ),
            317 => 
            array (
                'id' => 1348,
                'province_id' => 64,
                'municipality_name' => 'Perez',
            ),
            318 => 
            array (
                'id' => 1349,
                'province_id' => 64,
                'municipality_name' => 'Plaridel',
            ),
            319 => 
            array (
                'id' => 1350,
                'province_id' => 64,
                'municipality_name' => 'Quezon',
            ),
            320 => 
            array (
                'id' => 1351,
                'province_id' => 64,
                'municipality_name' => 'Sampaloc',
            ),
            321 => 
            array (
                'id' => 1352,
                'province_id' => 64,
                'municipality_name' => 'San Antonio',
            ),
            322 => 
            array (
                'id' => 1353,
                'province_id' => 64,
                'municipality_name' => 'San Narciso',
            ),
            323 => 
            array (
                'id' => 1354,
                'province_id' => 64,
                'municipality_name' => 'Tagkawayan',
            ),
            324 => 
            array (
                'id' => 1355,
                'province_id' => 64,
                'municipality_name' => 'Tiaong',
            ),
            325 => 
            array (
                'id' => 1356,
                'province_id' => 65,
                'municipality_name' => 'Aglipay',
            ),
            326 => 
            array (
                'id' => 1357,
                'province_id' => 65,
                'municipality_name' => 'Diffun',
            ),
            327 => 
            array (
                'id' => 1358,
                'province_id' => 65,
                'municipality_name' => 'Nagtipunan',
            ),
            328 => 
            array (
                'id' => 1359,
                'province_id' => 65,
                'municipality_name' => 'Cabarroguis',
            ),
            329 => 
            array (
                'id' => 1360,
                'province_id' => 65,
                'municipality_name' => 'Maddela',
            ),
            330 => 
            array (
                'id' => 1361,
                'province_id' => 65,
                'municipality_name' => 'Saguday',
            ),
            331 => 
            array (
                'id' => 1362,
                'province_id' => 66,
                'municipality_name' => 'Alcantara',
            ),
            332 => 
            array (
                'id' => 1363,
                'province_id' => 66,
                'municipality_name' => 'Cajidiocan',
            ),
            333 => 
            array (
                'id' => 1364,
                'province_id' => 66,
                'municipality_name' => 'Concepcion',
            ),
            334 => 
            array (
                'id' => 1365,
                'province_id' => 66,
                'municipality_name' => 'Ferrol',
            ),
            335 => 
            array (
                'id' => 1366,
                'province_id' => 66,
                'municipality_name' => 'Magdiwang',
            ),
            336 => 
            array (
                'id' => 1367,
                'province_id' => 66,
                'municipality_name' => 'Romblon',
            ),
            337 => 
            array (
                'id' => 1368,
                'province_id' => 66,
                'municipality_name' => 'San Andres',
            ),
            338 => 
            array (
                'id' => 1369,
                'province_id' => 66,
                'municipality_name' => 'San Jose',
            ),
            339 => 
            array (
                'id' => 1370,
                'province_id' => 66,
            'municipality_name' => 'Santa Maria (Imelda)',
            ),
            340 => 
            array (
                'id' => 1371,
                'province_id' => 66,
            'municipality_name' => 'Banton (Jones)',
            ),
            341 => 
            array (
                'id' => 1372,
                'province_id' => 66,
                'municipality_name' => 'Calatrava',
            ),
            342 => 
            array (
                'id' => 1373,
                'province_id' => 66,
                'municipality_name' => 'Corcuera',
            ),
            343 => 
            array (
                'id' => 1374,
                'province_id' => 66,
                'municipality_name' => 'Looc',
            ),
            344 => 
            array (
                'id' => 1375,
                'province_id' => 66,
                'municipality_name' => 'Odiongan',
            ),
            345 => 
            array (
                'id' => 1376,
                'province_id' => 66,
                'municipality_name' => 'San Agustin',
            ),
            346 => 
            array (
                'id' => 1377,
                'province_id' => 66,
                'municipality_name' => 'San Fernando',
            ),
            347 => 
            array (
                'id' => 1378,
                'province_id' => 66,
                'municipality_name' => 'Santa Fe',
            ),
            348 => 
            array (
                'id' => 1379,
                'province_id' => 67,
                'municipality_name' => 'Almagro',
            ),
            349 => 
            array (
                'id' => 1380,
                'province_id' => 67,
                'municipality_name' => 'Calbayog',
            ),
            350 => 
            array (
                'id' => 1381,
                'province_id' => 67,
                'municipality_name' => 'Catbalogan',
            ),
            351 => 
            array (
                'id' => 1382,
                'province_id' => 67,
                'municipality_name' => 'Gandara',
            ),
            352 => 
            array (
                'id' => 1383,
                'province_id' => 67,
                'municipality_name' => 'Jiabong',
            ),
            353 => 
            array (
                'id' => 1384,
                'province_id' => 67,
                'municipality_name' => 'Matuguinao',
            ),
            354 => 
            array (
                'id' => 1385,
                'province_id' => 67,
                'municipality_name' => 'Pagsanghan',
            ),
            355 => 
            array (
                'id' => 1386,
                'province_id' => 67,
                'municipality_name' => 'Pinabacdao',
            ),
            356 => 
            array (
                'id' => 1387,
                'province_id' => 67,
                'municipality_name' => 'San Jose de Buan',
            ),
            357 => 
            array (
                'id' => 1388,
                'province_id' => 67,
                'municipality_name' => 'Santa Margarita',
            ),
            358 => 
            array (
                'id' => 1389,
                'province_id' => 67,
                'municipality_name' => 'Santo Ni&ntilde;o',
            ),
            359 => 
            array (
                'id' => 1390,
                'province_id' => 67,
                'municipality_name' => 'Talalora',
            ),
            360 => 
            array (
                'id' => 1391,
                'province_id' => 67,
                'municipality_name' => 'Villareal',
            ),
            361 => 
            array (
                'id' => 1392,
                'province_id' => 67,
                'municipality_name' => 'Basey',
            ),
            362 => 
            array (
                'id' => 1393,
                'province_id' => 67,
                'municipality_name' => 'Calbiga',
            ),
            363 => 
            array (
                'id' => 1394,
                'province_id' => 67,
                'municipality_name' => 'Daram',
            ),
            364 => 
            array (
                'id' => 1395,
                'province_id' => 67,
                'municipality_name' => 'Hinabangan',
            ),
            365 => 
            array (
                'id' => 1396,
                'province_id' => 67,
                'municipality_name' => 'Marabut',
            ),
            366 => 
            array (
                'id' => 1397,
                'province_id' => 67,
                'municipality_name' => 'Motiong',
            ),
            367 => 
            array (
                'id' => 1398,
                'province_id' => 67,
            'municipality_name' => 'Paranas (Wright)',
            ),
            368 => 
            array (
                'id' => 1399,
                'province_id' => 67,
                'municipality_name' => 'San Jorge',
            ),
            369 => 
            array (
                'id' => 1400,
                'province_id' => 67,
                'municipality_name' => 'San Sebastian',
            ),
            370 => 
            array (
                'id' => 1401,
                'province_id' => 67,
                'municipality_name' => 'Santa Rita',
            ),
            371 => 
            array (
                'id' => 1402,
                'province_id' => 67,
                'municipality_name' => 'Tagapul-an',
            ),
            372 => 
            array (
                'id' => 1403,
                'province_id' => 67,
                'municipality_name' => 'Tarangnan',
            ),
            373 => 
            array (
                'id' => 1404,
                'province_id' => 67,
                'municipality_name' => 'Zumarraga',
            ),
            374 => 
            array (
                'id' => 1405,
                'province_id' => 68,
                'municipality_name' => 'Malapatan',
            ),
            375 => 
            array (
                'id' => 1406,
                'province_id' => 68,
                'municipality_name' => 'Alabel',
            ),
            376 => 
            array (
                'id' => 1407,
                'province_id' => 68,
                'municipality_name' => 'Kiamba',
            ),
            377 => 
            array (
                'id' => 1408,
                'province_id' => 68,
                'municipality_name' => 'Maitum',
            ),
        ));
        
        
    }
}