<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Models\Image;

class ImageController extends Controller
{

    public function upload()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        if (! $request->hasFile('image')) return "Nenhuma imagem enviada!";

        $image = $request->file('image');

        $imageName = hash('sha256', time() . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();

        $image->storeAs('public/images', $imageName);



        Session::flash('message', 'Mensagem enviada com sucesso')
        return view('upload');
    }


    public function show(Request $request, string $id)
    {
        // Seu código aqui
    }

}
