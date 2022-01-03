<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Database\Factories\BookFactory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('books', [
            'books' => Book::latest()->filter(request(['title', 'author', 'ISBN', 'category', 'language', 'year']))->get()
        ]);
    }

    public function create(Request $request)
    {
        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->editor = $request->input('editor');
        $book->summary = $request->input('summary');
        $book->slug = (new BookFactory)->definition()['slug'];
        $book->category_id = '1';
        $book->ISBN = $request->input('ISBN');;
        $book->number_of_copies = $request->input('number_of_copies');
        $book->language = $request->input('language');
        $book->year = $request->input('year');;
        $book->image_url = 'test';
        $book->save();
        return redirect('Books');
    }

    public function update(Request $request, $slug)
    {
        $book = Book::firstWhere('slug', $slug);
        $book->title = ($request->filled('title')) ? ($request->input('title')) : $book->title;
        $book->author = ($request->filled('author')) ? ($request->input('author')) : $book->author;
        $book->editor = ($request->filled('editor')) ? ($request->input('editor')) : $book->editor;
        $book->summary = ($request->filled('summary')) ? ($request->input('summary')) : $book->summary;
        $book->language = ($request->filled('language')) ? ($request->input('language')) : $book->language;
        $book->save();
        return redirect('Books');
    }

    public function destroy($slug)
    {
        Book::firstWhere('slug', $slug)->delete();
        return redirect('Books');
    }
}
