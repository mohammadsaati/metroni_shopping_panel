<?php

namespace Database\Factories;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;

    public function definition()
    {
        return [
            "name"              =>  $this->faker->words(4 , true) ,
            "en_name"           =>  $this->faker->words(4 , true) ,
            "slug"              =>  $this->faker->unique()->slug ,
            "image"             =>  $this->faker->randomElement( $this->chooseExistImage() ) ,
            "description"       =>  $this->faker->sentence ,
            "category_id"       =>  $this->faker->randomElement( Category::all()->pluck("id")->toArray() ) ,
            "brand_id"          =>  $this->faker->randomElement( Banner::all()->pluck("id")->toArray() ) ,
            "status"            =>  $this->faker->randomElement([0,1]) ,
            "is_amazing"        =>  $this->faker->randomElement( [1 , null] ) ,
            "is_amazing_date"   =>  $this->faker->randomElement( [Carbon::now() , null] ) ,
        ];
    }

    private function chooseExistImage() : array
    {
        return [
            "cloth1.jpg" ,
            "cloth2.jpg" ,
            "cloth3.jpg" ,
            "cloth4.jpg" ,
            "cloth5.jpg" ,
            "cloth6.jpg" ,
            "cloth7.jpg" ,
            "cloth8.jpg" ,
            "cloth9.jpg" ,
            "cloth10.jpg" ,
        ];
    }
}
