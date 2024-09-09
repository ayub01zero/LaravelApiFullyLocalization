<?php

namespace Database\Factories;

use App\Models\Data;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    protected $model = Data::class;

    public function definition(): array
    {
        // Arabic Faker instance
        $fakerAr = \Faker\Factory::create('ar_SA'); // Arabic (Saudi Arabia) locale

        // Kurdish example texts
        $kurdishExamples = [
            'name' => ['بەرهەم', 'پێشەنگ', 'کاریگەر'],
            'description' => ['بە شێوەی تایبەتی پێشکەش دەکرێت', 'دیزاینی زۆر جوان', 'چاو ڕەنگین دەکات'],
            'location' => ['هەولێر', 'سلێمانی', 'دهۆک'],
            'price' => ['١٠٠ دۆلار', '٢٠٠ دۆلار', '٣٠٠ دۆلار']
        ];

        // Arabic example texts for consistency
        $arabicExamples = [
            'name' => ['منتج', 'مميز', 'مفيد'],
            'description' => ['يقدم بشكل خاص', 'تصميم رائع', 'جذاب للغاية'],
            'location' => ['الرياض', 'جدة', 'مكة'],
            'price' => ['١٠٠ ريال', '٢٠٠ ريال', '٣٠٠ ريال']
        ];

        return [
            'name_en' => $this->faker->words(2, true),
            'name_ku' => $this->faker->randomElement($kurdishExamples['name']),
            'name_ar' => $this->faker->randomElement($arabicExamples['name']),
            'description_en' => $this->faker->sentence(),
            'description_ku' => $this->faker->randomElement($kurdishExamples['description']),
            'description_ar' => $this->faker->randomElement($arabicExamples['description']),
            'location_en' => $this->faker->address(),
            'location_ku' => $this->faker->randomElement($kurdishExamples['location']),
            'location_ar' => $this->faker->randomElement($arabicExamples['location']),
            'price_en' => $this->faker->randomFloat(2, 10, 100) . ' USD',
            'price_ku' => $this->faker->randomElement($kurdishExamples['price']),
            'price_ar' => $this->faker->randomElement($arabicExamples['price']),
            'state' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
