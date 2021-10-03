<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random_user = User::inRandomOrder()->first();
        return [
            'user_id' => $random_user->id,
            'name' => "{$this->faker->company()} Team",
            'ronin_id' => null,
        ];
    }
}
