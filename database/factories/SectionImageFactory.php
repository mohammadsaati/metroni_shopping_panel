<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SectionImage>
 */
class SectionImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "section_id"        =>  $this->faker->randomElement( Section::all()->pluck("id")->toArray() ) ,
            "image"             =>  $this->faker->numberBetween(1 , 4).".jpg" ,
        ];
    }
}
