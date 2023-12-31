<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logout successful, goodbye!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //validate and try to loguse in
        $attributes = request()->validate([ //bad
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        //if the auth faied


        if(! auth()->attempt($attributes)) 
        {
            throw ValidationException::withMessages([ 
                'email' => 'Provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();
        //successful redirect
        return redirect('/')->with('success', 'Login succesful. Welcome back!');
    }
}
