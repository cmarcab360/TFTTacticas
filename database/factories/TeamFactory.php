<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Team::class;
    public function definition()
    {
        return [
            'team_name' => fake()->name(),
            'victories' => fake()->numberBetween(0, 100),
            'num_match' => fake()->numberBetween(0, 100),
            'meta' => fake()->boolean(),
            'user_id' => User::factory()
        ];
    }
}
