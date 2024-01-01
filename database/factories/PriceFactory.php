<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "item_id"       =>   $this->faker->randomElement( Item::all()->pluck("id")->toArray() ),
            "after"         =>  $this->faker->numberBetween(1000 , 1000000) ,
            "before"        =>  $this->faker->numberBetween(50000 , 3000000) ,
            "status"        =>  $this->faker->randomElement([1 , 0]) ,
        ];
    }
}
