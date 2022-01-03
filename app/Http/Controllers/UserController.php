<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        User::create(request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['email', 'required', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7', 'max:255']
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
}
