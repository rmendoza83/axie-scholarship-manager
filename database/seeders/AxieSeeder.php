<?php

namespace Database\Seeders;

use App\Models\Axie;
use App\Models\Scholarship;
use Illuminate\Database\Seeder;

class AxieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scholarships = Scholarship::all();
        foreach ($scholarships as $scholarship)
        {
            Axie::factory()
            ->count(3)
            ->create([
                'scholarship_id' => $scholarship->id
            ]);
        }
    }
}
