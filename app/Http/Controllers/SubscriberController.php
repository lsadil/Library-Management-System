<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function create(Request $request)
    {
        request()->validate([
            'first_name' => ['required', 'max:255', 'min:3', 'string'],
            'last_name' => ['required', 'max:255', 'min:3', 'string'],
            'birthday' => ['required', 'date']
        ]);
        $subscriber = new Subscriber();
        $subscriber->first_name = $request->input('first_name');
        $subscriber->last_name = $request->input('last_name');
        $subscriber->birthday = $request->input('birthday');
        $subscriber->save();
        return redirect('Subscribers');
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'first_name' => ['required', 'max:255', 'min:3', 'string'],
            'last_name' => ['required', 'max:255', 'min:3', 'string'],
            'birthday' => ['required', 'date']
        ]);
        $subscriber = Subscriber::firstWhere('id', $id);
        $subscriber->first_name = ($request->filled('first_name')) ? ($request->input('first_name')) : ($subscriber->first_name);
        $subscriber->last_name = ($request->filled('last_name')) ? ($request->input('last_name')) : ($subscriber->last_name);
        $subscriber->birthday = ($request->filled('birthday')) ? ($request->input('birthday')) : ($subscriber->birthday);
        $subscriber->save();
        return redirect('Subscribers');
    }

    public function destroy($id)
    {
        $subscriber = Subscriber::firstWhere('id', $id);
        $subscriber->delete();
        return redirect('Subscribers');
    }

    public function destroyLoan($id)
    {
        Loan::firstWhere('id', $id)->delete();
        return redirect()->back();
    }
}
