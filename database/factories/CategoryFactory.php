<?php

namespace Database\Factories;

use App\Models\Category;
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
    protected $model = Category::class;
    public function definition(): array
    {
        return [
            "name"      =>  $this->faker->sentence(7) ,
            "slug"      =>  $this->faker->slug ,
            "parent_id" =>   $this->faker->randomElement( Category::all()->pluck("id")->toArray() ) ,
            "priority"      =>  $this->faker->randomDigitNotZero() ,
            "image"     =>  $this->faker->biasedNumberBetween(1 , 10).".jpg" ,
            "status"        =>  $this->faker->randomElement( [0 , 1] )
        ];
    }
}
