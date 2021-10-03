<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Scholarship;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
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
            Payment::factory()
                ->count(2)
                ->create([
                    'scholarship_id' => $scholarship->id
            ]);
        }
    }
}
