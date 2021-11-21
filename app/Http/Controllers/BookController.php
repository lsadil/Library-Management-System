<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create(Request $request)
    {
        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->editor = $request->input('editor');
        $book->summary = $request->input('summary');
        $book->slug = 'test';
        $book->category_id = 1;
        $book->ISBN = 234809039248;
        $book->number_of_copies = 1;
        $book->language = 'english';
        $book->year = 2021;
        $book->image_url = 'test';
        $book->save();
        return redirect('Books');
    }

    public function update(Request $request, $slug)
    {
        $book = Book::firstWhere('slug', $slug);
        $book->title = $request->input('title', '$book->title');
        $book->author = $request->input('author', '$book->author');
        $book->editor = $request->input('editor', '$book->editor');
        $book->summary = $request->input('summary', '$book->summary');
        $book->save();
        return redirect('Books');
    }

    public function destroy($slug)
    {
        $book = Book::firstWhere('slug', $slug);
        $book->delete();
        return redirect('Books');
    }
}
