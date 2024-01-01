<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            "title"         =>  $this->faker->words(10 , true) ,
            "priority"      =>  $this->faker->randomDigitNotNull ,
            "image"         => $this->faker->randomNumber(1 , 7).".jpg" ,
            "type"          =>  $this->faker->randomElement([1,2,3,4]) ,
            "product_id"    =>  $this->faker->randomElement( Product::all()->pluck("id")->toArray() ) ,
            "category_id"   =>  $this->faker->randomElement( Category::all()->pluck("id")->toArray() ) ,
            "section_id"    =>  $this->faker->randomElement( [] ) ,
            "link"          =>  Str::random() ,
            "status"        =>  $this->faker->randomElement([1,2]) ,
        ];
    }
}
