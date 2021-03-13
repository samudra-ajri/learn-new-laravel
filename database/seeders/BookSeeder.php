<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
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
        $books = Book::factory(20)->create();

        $scienceBook = Book::factory()->create([
            'title' => 'Science',
            'release_year' => 2018,
            'description' => 'Science description',
            'author_id' => 1,
        ]);

        $techBook = Book::factory()->create([
            'title' => 'Technology',
            'release_year' => 2019,
            'description' => 'Technology description',
            'author_id' => 2,
        ]);

        $misteryBook = Book::factory()->create([
            'title' => 'Mistery',
            'release_year' => 2020,
            'description' => 'Mistery description',
            'author_id' => 3,
        ]);

        $categories = Category::all();

        foreach ($books as $book) {
            $book->categories()->attach($categories->pluck('id'));
            $book->categories()->detach(rand(1, 3));
        }

        $scienceBook->categories()->attach([1]);

        $techBook->categories()->attach([2]);

        $misteryBook->categories()->attach([3]);

    }
}
