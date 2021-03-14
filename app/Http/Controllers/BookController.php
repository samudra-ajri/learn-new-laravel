<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::with(['author', 'categories'])->paginate(10));
    }

    public function store(BookStoreRequest $request)
    {
        $book = new Book();
        $book->fill($request->validated());
        $book->save();

        return new BookResource($book->load('author'));
    }

    public function show(Book $book)
    {
        return new BookResource($book->load('author'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->only('title', 'release_year', 'description', 'author_id'));

        return new BookResource($book->load('author'));
    }

    public function destroy(Book $book)
    {
        $book->delete();
    }
}
