<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Models\Image;

use Illuminate\Support\Facades\Storage;



class ImageController extends Controller
{

    public function upload()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        if (! $request->hasFile('image')) return redirect()->route('images.upload')->with('error', 'image uploaded with error');

        $image = $request->file('image');

        $imageName = hash('sha256', time() . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();

        $image->storeAs('public/images', $imageName);

        return redirect()->route('images.show', ['id' => $imageName]);
    }


    public function show(Request $request, string $id)
    {
        if (Storage::exists('public/images/' . $id)) {
            // Retorna a imagem como resposta HTTP
            return response()->file(Storage::path('public/images/' . $id));
        } else {
            // Retorna uma resposta de erro caso a imagem não exista
            abort(404);
        }
    }

}
