<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\Set;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    protected $model = Card::class;

    public function definition()
    {
        return [
            'set_id' => Set::factory(),
            'name' => $this->faker->word,
            'version' => $this->faker->word,
            'number' => $this->faker->randomNumber(),
            'card_identifier' => $this->faker->uuid,
            'image' => $this->faker->imageUrl(),
            'thumbnail' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'rarity' => $this->faker->word,
            'story' => $this->faker->text,
            'normal_quantity' => $this->faker->randomNumber(),
            'foil_quantity' => $this->faker->randomNumber(),
        ];
    }
}
