<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory(20)->create();

        Book::factory()->create([
            'title' => 'Book 1 Seed',
            'release_year' => 2018,
            'description' => 'Book 1 Seed description',
        ]);

        Book::factory()->create([
            'title' => 'Book 2 Seed',
            'release_year' => 2019,
            'description' => 'Book 2 Seed description',
        ]);

        Book::factory()->create([
            'title' => 'Book 3 Seed',
            'release_year' => 2020,
            'description' => 'Book 3 Seed description',
        ]);
    }
}
