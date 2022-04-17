<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
