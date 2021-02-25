<?php

namespace Database\Factories;

use App\Models\Reseller;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResellerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reseller::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reseller_number' => $this->faker->text($maxNbChars = 50),
            'name' => $this->faker->name            
        ];
    }
}
