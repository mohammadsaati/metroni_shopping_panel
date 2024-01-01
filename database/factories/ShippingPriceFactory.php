<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShippingPrice>
 */
class ShippingPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "city_id"       =>  $this->faker->randomElement( City::all()->pluck("id")->toArray() ) ,
            "item_id"       =>  $this->faker->randomElement( Item::all()->pluck("id")->toArray() ) ,
            "price"         => $this->faker->numberBetween(10000 , 50000) ,
        ];
    }
}
