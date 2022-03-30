<?php

namespace Database\Factories\Wave;

use Illuminate\Database\Eloquent\Factories\Factory;
use Wave\Skill;
use Wave\User;

class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    private static $order = 1;

    public function definition()
    {
        return [

            'name' => $this->faker->text(8),

            'percentage' => round(mt_rand() / mt_getrandmax(), 2),

            'owner_id' => User::all()->random()->id,

            'order' => self::$order++,

            'featured' => $this->faker->boolean(90)

        ];
    }
}
