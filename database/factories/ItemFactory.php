<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Item::class;

    public function definition(): array
    {
        return [
        "product_id"        =>  $this->faker->randomElement( Product::all()->pluck("id")->toArray() ) ,
//        "color_id"          =>  $this->faker->randomElement( Color::all()->pluck("id")->toArray() ) ,
        "size_id"           =>  $this->faker->randomElement( Size::all()->pluck("id")->toArray() ) ,
        "stock"             =>  $this->faker->randomNumber() ,
        "shipping_price"    =>  $this->faker->numberBetween(10000 , 50000) ,
        "status"            =>  $this->faker->randomElement( [ 0 , 1 ] ) ,
      ];
    }
}
