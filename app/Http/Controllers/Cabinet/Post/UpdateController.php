<?php

namespace App\Http\Controllers\Cabinet\Post;

use App\Models\Post;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Controllers\Cabinet\Post\BaseController;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($data, $post);
        return redirect()->route('cabinet.index');
    }
}
