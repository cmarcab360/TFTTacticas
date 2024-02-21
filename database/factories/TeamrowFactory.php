<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;
use App\Models\Teamrow;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teamrow>
 */
class TeamrowFactory extends Factory
{

    protected $model = Teamrow::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'character_id' => fake()->numberBetween(0, 100),
            'team_id' => Team::factory(),
            'position' => fake()->numberBetween(1, 28),
            'item1' => fake()->sentence(1),
            'item2' => fake()->sentence(1),
            'item3' => fake()->sentence(1),
        ];
    }
}
