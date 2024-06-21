<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Data;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{

     /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Data::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_en' => $this->faker->word,
            'name_ku' => $this->faker->optional()->word,
            'name_ar' => $this->faker->optional()->word,
            'description_en' => $this->faker->sentence,
            'description_ku' => $this->faker->optional()->sentence,
            'description_ar' => $this->faker->optional()->sentence,
            'location_en' => $this->faker->address,
            'location_ku' => $this->faker->optional()->address,
            'location_ar' => $this->faker->optional()->address,
            'price_en' => $this->faker->randomFloat(2, 10, 1000),
            'price_ku' => $this->faker->optional()->randomFloat(2, 10, 1000),
            'price_ar' => $this->faker->optional()->randomFloat(2, 10, 1000),
            'state' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
