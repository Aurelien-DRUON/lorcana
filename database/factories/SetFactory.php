<?php

namespace Database\Factories;

use App\Models\Set;
use Illuminate\Database\Eloquent\Factories\Factory;

class SetFactory extends Factory
{
    protected $model = Set::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'code' => $this->faker->unique()->numberBetween(1, 999),
            'release_date' => $this->faker->date,
            'card_number' => $this->faker->numberBetween(1, 200),
        ];
    }
}
