<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSection>
 */
class ProductSectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "product_id"    =>  $this->faker->randomElement( Product::all()->pluck("id")->toArray() ) ,
            "section_id"    =>  $this->faker->randomElement( Section::all()->pluck("id")->toArray() ) ,
        ];
    }
}
