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
        $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ], [
            'image.required' => 'Please select an image to upload.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image format must be JPEG, PNG, JPG, or GIF.',
            'image.max' => 'The maximum size of the image is 2MB.',
        ]);

        if (!$request->hasFile('image')) {
            return redirect()->route('images.upload')->with('error', 'Image uploaded with error');
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