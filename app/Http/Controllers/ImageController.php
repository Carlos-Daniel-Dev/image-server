<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ImageController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        if (!$request->hasFile('image')) {
            return redirect()->route('images.upload')->with('error', 'image uploaded with error');
        }

        $image = $request->file('image');

        $imageName = hash('sha256', time() . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();

        $image->storeAs('public/images', $imageName);

        return redirect()->route('images.show', ['id' => $imageName]);
    }

    public function show(Request $request, string $id)
    {
        if (Storage::exists('public/images/' . $id)) {
            $filePath = 'public/images/' . $id;
            $url = URL::to(Storage::url($filePath));
            
            return view('show', ['url' => $url]);
        } else {
            return view('errors.image_not_found');
        }
    }
}