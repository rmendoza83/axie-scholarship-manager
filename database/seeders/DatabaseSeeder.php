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
        $this->call([
            ProfileSeeder::class,
            UserSeeder::class,
            TeamSeeder::class,
            ScholarshipSeeder::class,
            AxieSeeder::class,
            SlpSeeder::class,
            RankSeeder::class,
            ClaimSlpSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
