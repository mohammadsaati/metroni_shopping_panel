<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"          =>  $this->faker->title ,
            "slug"          =>  $this->faker->slug ,
            "bg_color"      =>  $this->faker->colorName ,
            "bg_image"      =>  $this->faker->randomNumber(1 , 7).".jpg" ,
            "status"        =>  $this->faker->randomElement([0 , 1])
        ];
    }
}
