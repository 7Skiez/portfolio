<?php

namespace Database\Factories\Wave;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Wave\Project;

class ProjectFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    private static $order = 1;

    public function definition()
    {
        $locationDate = 'projects/' . Carbon::now()->format('FY') . '/';

        return [

            'title' => $this->faker->text(50),
            'description' => $this->faker->realText(255),
            'link' => $this->faker->url(),
            'link_title' => $this->faker->realText(20),
            'image' => $locationDate .app('Picsum')->image('public/storage/' .$locationDate , 852, 480, null, false),
            'owner_id' => User::all()->random()->id,
            'order' => self::$order++,
            'active' => $this->faker->boolean(90),
            'featured' => $this->faker->boolean(90)

        ];
    }
}
