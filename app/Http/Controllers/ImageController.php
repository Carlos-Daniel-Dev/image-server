<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function upload()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        
    }


    public function show(Request $request, string $id)
    {
        // Seu código aqui
    }

}
