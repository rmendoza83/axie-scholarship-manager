<?php

namespace Database\Factories;

use App\Models\ClaimSlp;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClaimSlpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClaimSlp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'scholarship_id' => null,
            'claim_slp_date' => $this->faker->date(),
            'amount' => $this->faker->biasedNumberBetween(1500, 5000)
        ];
    }
}
