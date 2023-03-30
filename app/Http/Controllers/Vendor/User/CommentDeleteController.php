<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentDeleteController extends Controller
{
	public function __invoke(Comment $comment)
	{
		$comment->delete();
		return redirect()->back();
	}
}
