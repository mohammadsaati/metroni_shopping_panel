<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = City::class;

    public function definition(): array
    {
        return [
            "name"          =>  $this->faker->city ,
            "slug"          =>  $this->faker->slug ,
            "status"        =>  $this->faker->randomElement( [0 ,1] ) ,
            "province_id"   =>  $this->faker->randomElement( array_merge( [null] , City::all()->pluck("id")->toArray() ) )
        ];
    }
}
