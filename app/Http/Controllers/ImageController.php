<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

use App\Models\Image;

class ImageController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ], [
            'title.required' => 'Por favor, insira um título para a foto.',
            'title.min' => 'O título deve ter pelo menos :min caracteres.',
            'title.max' => 'O título não pode ter mais de :max caracteres.',
            'image.required' => 'Por favor, selecione uma imagem para enviar.',
            'image.image' => 'O arquivo enviado deve ser uma imagem.',
            'image.mimes' => 'O formato da imagem deve ser JPEG, PNG, JPG ou GIF.',
            'image.max' => 'O tamanho máximo da imagem é de :max kilobytes.',
        ]);

        $title = $request->input('title');

        if (!$request->hasFile('image')) {
            return redirect()->route('images.upload')->with('error', 'Image uploaded with error');
        }

        $image = $request->file('image');

        $imageName = hash('sha256', time() . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();

        $image->storeAs('public/images', $imageName);


        $newImage = new Image;
        $newImage->title = $request->input('title');
        $newImage->hash = $imageName;
        $newImage->save();



        return redirect()->route('images.show', ['id' => $imageName]);
    }


    public function show(Request $request, string $id)
    {
        if (Storage::exists('public/images/' . $id)) {
            $filePath = 'public/images/' . $id;
            $url = URL::to(Storage::url($filePath));

            $title = Image::where('hash', $id)->value('title');
            
            return view('show', [
                'url' => $url,
                'title' => $title
            ]);
        } else {
            return view('errors.image_not_found');
        }
    }
}