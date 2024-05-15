<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\Category;
use App\Models\Compound;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_id = Category::all()->pluck('id')->toArray();
        $agent_id = Agent::all()->pluck('id')->toArray();
        $compound = Compound::inRandomOrder()->first();

        return [
            'size' => $this->faker->numberBetween(50, 300),
            'price' => $this->faker->numberBetween(500000, 30000000),
            'description_en' => $this->faker->paragraph(),
            'description_ar' => $this->faker->paragraph(),
            'bedrooms' => $this->faker->numberBetween(1, 4),
            'location_link' => $this->faker->url(),
            'category_id' => $this->faker->randomElement($category_id),
            'compound_id' => $compound ? $compound->id : null,
            'location_id' => $compound ? $compound->location_id : null,
            'agent_id' => $this->faker->randomElement($agent_id),
        ];
    }
}


