<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class SingUpController extends Controller
{
    public function index ()
    {
        return view('singup');
    }

    public function store (Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:5|max:24',
            'email' => 'required|email',
            'password' => 'required|min:5|max:24'
        ]);

        User::create([

            'username' => $validated->input('username'),
            'email' => $validated->input('email'),
            'password' => $validated->input('password'),

        ]);

        return 'opa';

    }
}
