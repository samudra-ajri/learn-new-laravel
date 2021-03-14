<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return AuthorResource::collection(Author::all());
    }

    public function store(AuthorStoreRequest $request)
    {
        $author = new Author();
        $author->fill($request->validated());
        $author->save();

        return new AuthorResource($author);
    }

    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    public function update(AuthorUpdateRequest $request, Author $author)
    {
        $author->update($request->only('first_name', 'last_name', 'email'));

        return new AuthorResource($author);
    }

    public function destroy(Author $author)
    {
        $author->delete();
    }
}
