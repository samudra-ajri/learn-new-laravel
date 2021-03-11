<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(BookStoreRequest $request)
    {
        $book = new Book();
        $book->fill($request->validated());
        $book->save();

        return $book;
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->only('title', 'release_year', 'description'));

        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();
    }
}
