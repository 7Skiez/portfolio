<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CertificationFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    private static $order = 1;

    public function definition()
    {
        $locationDate = 'certifications/' . Carbon::now()->format('FY') . '/';

        return [

            'title' => $this->faker->text(8),
            'image' => $locationDate .app('Picsum')->image('public/storage/' .$locationDate , 150, 150, null, false),
            'link' => $this->faker->url(),
            'bg_rotation' => round(round(mt_rand() / mt_getrandmax(), 2)*360, 0),
            'owner_id' => User::all()->random()->id,
            'order' => self::$order++,
            'featured' => $this->faker->boolean(90)

        ];
    }
}
