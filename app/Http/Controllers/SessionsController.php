<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'email' => ['email', 'required'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/');
        }
        throw ValidationException::withMessages(['email' => 'Your credentials could not be verified.']);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
