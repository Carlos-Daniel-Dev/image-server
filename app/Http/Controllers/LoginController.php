<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    public function index ()
    {
        return view('login');
    }

    public function login (Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:24'
        ]);

        $email = $validated['email'];
        $password = $validated['password'];

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return redirect()->route('home')->withCookie(cookie('user_token', $token, 60*24*365));
        } else {
            return redirect()->route('login');
        }

    }
}
