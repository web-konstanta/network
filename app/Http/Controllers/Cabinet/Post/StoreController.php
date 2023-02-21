<?php

namespace App\Http\Controllers\Cabinet\Post;

use App\Http\Controllers\Cabinet\Post\BaseController;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('cabinet.index');
    }
}
