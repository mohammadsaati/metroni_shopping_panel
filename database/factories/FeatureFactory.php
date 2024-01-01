<?php

namespace Database\Factories;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Feature::class;

    public function definition(): array
    {
        return [
            "name"      =>  $this->faker->sentence(2) ,
            "slug"      =>  $this->faker->slug ,
            "status"    =>  $this->faker->randomElement( [ 0 , 1 ] )
        ];
    }
}
