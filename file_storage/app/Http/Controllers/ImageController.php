<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        return view("images");
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'featured_image' => 'required|file|max:7000', // max 7MB
        ]);

        $path = Storage::putFile(
            'public/images/profile',
            $request->file('featured_image')
        );

        return redirect()
            ->back()
            ->withSuccess("Image succes Uploaded in " . $path);
    }
}
