<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"      =>  $this->faker->words(2) ,
            "slug"      =>  $this->faker->slug ,
            "parent_id" =>  null ,
            "image"     =>  $this->faker->biasedNumberBetween(1 , 10).".jpg" ,
        ];
    }
}
