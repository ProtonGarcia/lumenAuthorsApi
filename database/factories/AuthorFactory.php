<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Author::factory()
        // ->count(50)
        // ->create();


        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'country' => $this->faker->country,
        ];
    }
}

// $factory->define(Article::class, function (Faker $faker) {
//     return [
//         'name' => $this->faker->name,
//         'gender' => $this->faker->randomElement(['male', 'female']),
//         'country' => $this->faker->country,
//     ];
// });