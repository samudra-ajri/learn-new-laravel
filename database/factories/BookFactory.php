<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $order = 1;
        return [
            'title' => 'Book title ' . $order++,
            'release_year' => $this->faker->year,
            'description' => $this->faker->realText,
            'author_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
