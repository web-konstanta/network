<?php

namespace App\Http\Controllers\Cabinet\Post;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['image'] = Storage::disk('public')->put('image/', $data['image']);
        Post::create([
            'text' => $data['text'],
            'image' => $data['image'],
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('cabinet.index');
    }
}
