<?php

namespace Database\Factories;

use App\Models\Axie;
use Illuminate\Database\Eloquent\Factories\Factory;

class AxieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Axie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'scholarship_id' => null,
            'name' => $this->faker->domainWord(),
            'axie_id' => null
        ];
    }
}
