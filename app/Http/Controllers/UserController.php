<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $user = new User;
        $user->name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return redirect('Users');
    }

    public function update(Request $request, $id)
    {
        $user = User::firstWhere('id', $id);
        $user->name = ($request->filled('name')) ? ($request->input(name)) : $user->name;
        $user->email = ($request->filled('email')) ? ($request->input(email)) : $user->email;
        $user->password = ($request->filled('password')) ? ($request->input(password)) : $user->password;
    }

    public function destroy($id)
    {
        $user = User::firstWhere('id', $id);
        $user->delete();
        return redirect('Users');
    }
}
