<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingUpController extends Controller
{
    public function index ()
    {
        return view('singup');
    }
}
