<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ticketFactory extends Factory

{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'compaany_id' => company::inRandomOrder()->first()->id,
            'city_id'=> city::inRandomOrder()->first()->id,
            'date_s' => $this->faker->date(),
            'date_e' => $this->faker->date(),
        ];
    }
}
