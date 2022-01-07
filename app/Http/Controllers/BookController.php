<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Keyword;
use Database\Factories\BookFactory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('books', [
            'books' => Book::latest()->filter(
                request(['title', 'author', 'ISBN', 'category', 'keyword', 'language', 'year']))
                ->paginate(10)->withQueryString(),
            'keywords' => Keyword::all()
        ]);
    }

//    public function liveSearch()
//    {
//        $books = [];
//        if (request()->has('livesearch')) {
//            $books = Book::select("title", "ISBN")
//                ->where('ISBN', 'like', '%' . request('livesearch') . '%')->get();
//        }
//        return response()->json($books);
//    }

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

        if ($request->filled('keyword')) {
            for ($i = count(request('keyword')); $i != 0; $i--) {
                Keyword::firstOrCreate(
                    ['keyword' => $request->input('keyword')[$i - 1]],
                    ['book_id' => $book->id]
                );
            }
        }
        if ($request->hasFile('photo')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            $request->file('photo')->store('images', 'public');
            $book->image_url = $request->file('photo')->hashName();
        }
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
        $book->ISBN = ($request->filled('ISBN')) ? ($request->input('ISBN')) : $book->ISBN;
        if ($request->filled('keyword')) {
            for ($i = count(request('keyword')); $i != 0; $i--) {
                Keyword::firstOrCreate(
                    ['keyword' => $request->input('keyword')[$i - 1]],
                    ['book_id' => $book->id]
                );
            }
        }
        if ($request->hasFile('photo')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            $request->file('photo')->store('images', 'public');
            $book->image_url = $request->file('photo')->hashName();
        }
        $book->save();
        return redirect('Books');
    }

    public function destroy($slug)
    {
        Book::firstWhere('slug', $slug)->delete();
        return redirect('Books');
    }
}
