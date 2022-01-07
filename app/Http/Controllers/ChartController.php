<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;

class ChartController extends Controller
{
    public function index()
    {
        $month = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
        $cats = ['1', '2', '3', '4', '5'];
        $loans = [];
        $returns = [];
        $booksC = [];
        $booksWithC = [];
        $count = 0;
        foreach ($month as $key => $value) {
            $loans[] = Loan::whereMonth('loan_start', $value)->count();
            $returns[] = Loan::whereMonth('loan_turn_in', $value)->count();
            $count += Book::whereMonth('added_in', $value)->count();
            $booksC[] = $count;
        }
        foreach ($cats as $key => $value) {
            $booksWithC[] = Book::where('category_id', $value)->count();
        }
        return view('home')
            ->with('returns', json_encode($returns, JSON_NUMERIC_CHECK))
            ->with('loan', json_encode($loans, JSON_NUMERIC_CHECK))
            ->with('booksWithC', json_encode($booksWithC, JSON_NUMERIC_CHECK))
            ->with('booksc', json_encode($booksC, JSON_NUMERIC_CHECK));
    }
}
