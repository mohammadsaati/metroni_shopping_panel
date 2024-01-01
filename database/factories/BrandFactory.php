<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Brand::class;

    public function definition(): array
    {
        return [
            "name"          =>  $this->faker->city ,
            "slug"          =>  $this->faker->slug ,
            "status"        =>  $this->faker->randomElement( [0 ,1] ) ,
            "image"         =>  $this->faker->biasedNumberBetween(1 , 10).".jpg" ,
        ];
    }
}
