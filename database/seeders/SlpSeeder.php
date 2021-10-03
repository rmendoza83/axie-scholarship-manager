<?php

namespace Database\Seeders;

use App\Models\Slp;
use App\Models\Scholarship;
use Illuminate\Database\Seeder;
use App\Helpers\SeederHelper;
use DateTime;

class SlpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $begin = new DateTime();
        $begin = $begin->modify('-30 day');
        $end = new DateTime();
        $datesRange = SeederHelper::getDateRange($begin, $end);

        $scholarships = Scholarship::all();
        foreach ($scholarships as $scholarship)
        {
            foreach ($datesRange as $date)
            {
                Slp::factory()->create([
                    'scholarship_id' => $scholarship->id,
                    'slp_date' => $date
                ]);
            }
        }
    }
}
