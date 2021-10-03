<?php

namespace Database\Factories;

use App\Models\Slp;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'scholarship_id' => null,
            'slp_date' => $this->faker->date(),
            'amount' => $this->faker->biasedNumberBetween(0, 501)
        ];
    }
}
