<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(BookStoreRequest $request)
    {
        $book = new Book();
        $book->fill($request->validate());
        $book->save();

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
