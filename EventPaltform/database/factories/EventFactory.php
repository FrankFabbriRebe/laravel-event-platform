<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'name' => fake() -> word(), 
            'description' => fake() -> paragraph(), 
            'date' => fake() -> dateTimeBetween('-1 year', 'now'), 
            'location' => fake() -> city()
        ];
    }
}