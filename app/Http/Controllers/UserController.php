<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        User::create(request()->validate([
            'name' => ['required', 'max:255', 'min:3', 'alpha'],
            'email' => ['email', 'required', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7', 'max:255', 'alpha_num']
        ]));
//        session()->flash('success', 'Your account has been created.');
        return redirect('Users');
    }

    public function update(Request $request, $id)
    {

        $user = User::firstWhere('id', $id);
        $user->name = ($request->filled('name')) ? ($request->input('name')) : $user->name;
        $user->email = ($request->filled('email')) ? ($request->input('email')) : $user->email;
        $user->password = ($request->filled('password')) ? ($request->input('password')) : $user->password;
        $user->save();
        return redirect('Users');
    }

    public function destroy($id)
    {
        $user = User::firstWhere('id', $id);
        $user->delete();
        return redirect('Users');
    }

    public function addLoan(Subscriber $subscriber)
    {
        request()->validate([
            'book_ISBN' => ['required', 'digits_between:10,13', Rule::exists('books', 'ISBN')],
            'loan_start' => ['required', 'date'],
            'loan_end' => ['required', 'date', 'after:loan_start']
        ]);
        Loan::create([
            'subscriber_id' => $subscriber->id,
            'book_id' => Book::where('ISBN', request('book_ISBN'))->first()->id,
            'loan_start' => request('loan_start'),
            'loan_end' => request('loan_end')
        ]);
        return redirect()->route('Profile', $subscriber);
    }
}
