<?php

namespace App\Service;

use App\Models\Post;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostService
{
    public function store(array $data): void
    {
        try {
            $imageName = md5(Carbon::now() . '_' . $data['image']->getClientOriginalName());
            $image = Image::make($data['image'])
                        ->fit(300, 350)
                        ->save(public_path('storage/image/' . $imageName . '.jpg'));
            $data['image'] = 'image/' . $image->basename;
            if (isset($data['tags_id'])) {
                $tags = $data['tags_id'];
                unset($data['tags_id']);
            }
            $post = Post::create([
                'text' => $data['text'],
                'image' => $data['image'],
                'user_id' => Auth::user()->id
            ]);
            if (isset($tags)) {
                $post->tags()->attach($tags);
            }
        } catch (Exception $exception) {
            abort(500);
        }
    }

    public function update(array $data, Post $post): void
    {
        if (isset($data['image'])) {
            $imageName = md5(Carbon::now() . '_' . $data['image']->getClientOriginalName());
            $image = Image::make($data['image'])
                        ->fit(300, 350)
                        ->save(public_path('storage/image/' . $imageName . '.jpg'));
            $data['image'] = 'image/' . $image->basename;
        }
        $tags = $data['tags_id'];
        unset($data['tags_id']);
        $post->update($data);
        $post->tags()->sync($tags);
    }
}
