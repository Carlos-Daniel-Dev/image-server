<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Cookie;


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


        $token = hash('sha256', time() . $validated['email']);

        User::create([

            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $password = Hash::make($password),
            'token' => $token

        ]);

        return redirect()->route('home')->withCookie(cookie('user_token', $token, 60*24*365));

    }
}
