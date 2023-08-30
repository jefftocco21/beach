<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsLetterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);


        try {
            $newsletter->subscribe(request('email'));
    
        } catch (\Exception $e){
            throw ValidationException::withMessages([
                'email' => 'Sorry, this email could not be added to newsletter.'
            ]);
        }
        
        return redirect('/')->with('success', 'You are now signed up for the newsletter!');
    }
}
