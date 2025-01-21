<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostImage\StoreRequest;
use App\Http\Resources\Admin\PostImage\StoreImageResource;
use App\Models\PostImage;

use Illuminate\Support\Facades\Storage;

class ImagePostController extends Controller
{
    public function store(StoreRequest $request){
        $data = $request->validated();
        $path = Storage::disk('public')->put('images/posts', $data['image']);

        $image = PostImage::create([
            'path' => $path,
            'user_id' => auth()->id()
        ]);


        return new StoreImageResource($image);

    }
}
