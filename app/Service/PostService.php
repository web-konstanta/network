<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store(array $data): void
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

    public function update(array $data, Post $post): void
    {
        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('image', $data['image']);
        }
        $tags = $data['tags_id'];
        unset($data['tags_id']);
        $post->update($data);
        $post->tags()->sync($tags);
    }

    public function delete($post): void
    {
        DB::table('post_tag')
            ->where('post_id', $post->id)
            ->delete();
        $post->delete();
    }
}
