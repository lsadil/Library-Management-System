<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function create(Request $request)
    {
        $subscriber = new Subscriber();
        $subscriber->first_name = $request->input('first_name');
        $subscriber->last_name = $request->input('last_name');
        $subscriber->birthday = $request->input('birthday');
        $subscriber->save();
        return redirect('Subscribers');
    }

    public function update(Request $request, $id)
    {
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
}
