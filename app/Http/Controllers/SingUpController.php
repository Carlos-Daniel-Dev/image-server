<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingUpController extends Controller
{
    public function index ()
    {
        return view('singup');
    }

    public function store ()
    {
        $validated = $request->validate([
            'username' => 'required|min:5|max:24',
            'email' => 'required|email',
            'password' => 'required|min:5|max:24'
        ]);
    }
}
