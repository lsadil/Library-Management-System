<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ChartController extends Controller
{
    public function index(): Factory|View|Application
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

        $totalSubs = Subscriber::count();
        $newSubs = Subscriber::whereDate('created_at', Carbon::today())->count();
        return view('home', [
            'todayB' => Loan::whereDate('loan_start', Carbon::today())->count(),
            'totalBooks' => Book::count(),
            'totalSubs' => $totalSubs,
            'newSubs' => $newSubs,
        ])
            ->with('returns', json_encode($returns, JSON_NUMERIC_CHECK))
            ->with('loan', json_encode($loans, JSON_NUMERIC_CHECK))
            ->with('booksWithC', json_encode($booksWithC, JSON_NUMERIC_CHECK))
            ->with('booksc', json_encode($booksC, JSON_NUMERIC_CHECK));
    }
}
