<?php

namespace Database\Factories\Wave;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Wave\Medium;
use Wave\User;

class MediumFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medium::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    private static $order = 1;

    public function definition()
    {
        $locationDate = 'mediums/' . Carbon::now()->format('FY') . '/';

        return [

            'name' => $this->faker->text(8),
            'image' => $locationDate .app('Picsum')->image('public/storage/' .$locationDate , 100, 100, null, false),
            'link' => $this->faker->url(),
            'owner_id' => User::all()->random()->id,
            'order' => self::$order++,
            'featured' => $this->faker->boolean(90)

        ];
    }
}
