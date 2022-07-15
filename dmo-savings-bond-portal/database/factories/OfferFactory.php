<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'wf_status' => $this->faker->name(),
            'offer_title' => $this->faker->unique()->safeEmail(),
            'price_per_unit' => $this->faker->randomNumber(),
            'max_units_per_investor' => $this->faker->randomNumber(),
            'interest_rate_pct' => $this->faker->randomNumber(),
            'offer_start_date' => $this->faker->date(),
            'offer_end_date' => $this->faker->date(),
            'offer_settlement_date' => $this->faker->date(),
            'offer_maturity_date' => $this->faker->date(),
        ];
    }
}
