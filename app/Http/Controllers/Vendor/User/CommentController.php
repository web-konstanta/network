<?php

namespace App\Http\Controllers\Vendor\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
	public function __invoke(int $postId, string $text)
	{
		$user = auth()->user();
		$data = [
			'post_id' => $postId,
			'user_id' => $user->id,
			'text' => $text
		];

		Comment::create($data, $data);
		$comment = Comment::select('text')
						->where('post_id', $postId)
						->where('user_id', $user->id)
						->first();

		return response()->json([
			'text' => $comment->text,
			'userNickName' => $user->name,
			'userAvatar' => $user->avatar,
		]);
	}
}
