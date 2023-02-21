<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        $data['image'] = Storage::disk('public')->put('image/', $data['image']);
        $tags = $data['tags_id'];
        unset($data['tags_id']);
        $post = Post::create([
            'text' => $data['text'],
            'image' => $data['image'],
            'user_id' => Auth::user()->id
        ]);
        $post->tags()->attach($tags);
    }

    public function update($data, $post)
    {
        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('image', $data['image']);
        }
        $tags = $data['tags_id'];
        unset($data['tags_id']);
        $post->update($data);
        $post->tags()->sync($tags);
    }
}
