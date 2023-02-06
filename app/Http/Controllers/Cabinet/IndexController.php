<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('cabinet.index');
    }
}
