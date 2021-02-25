<?php

namespace Database\Factories;

use App\Models\Display;
use Illuminate\Database\Eloquent\Factories\Factory;

class DisplayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Display::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serial_number' => $this->faker->text($maxNbChars = 50),
            'type' => $this->faker->text($maxNbChars = 50),
            'file_path' => $this->faker->text($maxNbChars = 150)
        ];
    }
}
