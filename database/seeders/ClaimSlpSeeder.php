<?php

namespace Database\Seeders;

use App\Models\ClaimSlp;
use App\Models\Scholarship;
use Illuminate\Database\Seeder;

class ClaimSlpSeeder extends Seeder
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
            ClaimSlp::factory()
                ->count(2)
                ->create([
                    'scholarship_id' => $scholarship->id
            ]);
        }
    }
}
