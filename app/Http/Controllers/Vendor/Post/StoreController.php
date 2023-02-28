<?php

namespace App\Http\Controllers\Vendor\Post;

use App\Http\Controllers\Vendor\Post\BaseController;
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
