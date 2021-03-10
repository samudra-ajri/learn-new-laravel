<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(Request $request)
    {
        $book = Book::create(
            $request->only('title', 'release_year', 'description')
        );

        return response($book, Response::HTTP_CREATED);
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->only('title', 'release_year', 'description'));

        return response($book, Response::HTTP_ACCEPTED);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
