<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname'=>$this->faker->name,
            'gender'=>$this->faker->randomElement([0, 1]),
            'email'=>$this->faker->safeEmail,
            'postcode'=>$this->faker->numerify('8'),
            'address'=>$this->faker->address,
            'building_name'=>$this->faker->buildingNumber,
            'opinion'=>$this->faker->text(120),
        ];
    }
}
