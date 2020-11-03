<?php

namespace Database\Factories;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        'name' => $this->faker->realText(rand(30, 200)),
        'desc' => $this->faker->realText(rand(30, 1000)),
        'price' => $this->faker->numberBetween(1,10000),
        'img1' => 'https://avatars.mds.yandex.net/get-mpic/1767151/img_id313886601445063822.jpeg/orig',
        'img2' => '',
        'img3' => '',
        'created_at' => now(),
        'updated_at' => now(),
      ];
    }
}
