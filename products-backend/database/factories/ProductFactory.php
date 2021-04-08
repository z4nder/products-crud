<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'stock' => $this->faker->numberBetween($min = 10, $max = 100),
            'price' => $this->faker->numberBetween($min = 10, $max = 100),
            'weight' => $this->faker->numberBetween($min = 10, $max = 100),
            'is_available' => $this->faker->boolean(50)
        ];
    }
}
