<?php

namespace Database\Factories;

use App\Models\Location;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'name_bn' => $this->faker->sentence,

            'featured_image' => 'https://picsum.photos/1200/800?random=' . rand(10, 1000),
            'location_id' => Location::all()->random()->id,
            'price' => rand(100000,500000),
            'sale' => rand(1,2),
            'type' => rand(1,3),
            'bedrooms' => rand(1,6),
            'drawing_rooms' => rand(1,6),
            'kitchens' => rand(1,2),
            'bathrooms' => rand(1,5),
            'net_sqm' => rand(55,300),
            'gross_sqm' => rand(65,450),
            'pool' => rand(1,4),

            'overview' => $this->faker->text(100),
            'overview_bn' => $this->faker->text(100),

            'why_buy' => $this->faker->text(1000),
            'why_buy_bn' => $this->faker->text(1000),

            'description' => $this->faker->text(500),
            'description_bn' => $this->faker->text(500)
        ];
    }
}
