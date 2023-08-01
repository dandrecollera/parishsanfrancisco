<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ProvinceTableSeeder::class);
        $this->call(MunicipalityTableSeeder::class);
        $this->call(MainUsersTableSeeder::class);
        $this->call(MainUsersDetailsTableSeeder::class);
        $this->call(PriestsTableSeeder::class);
        $this->call(VolunteersTableSeeder::class);
    }
}
