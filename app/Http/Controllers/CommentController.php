<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Content;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function postComment(Request $request)
	{
		if(Auth::check()){
			$user_id = Auth::id();
			$user = Auth::user()->username;
		} else {
			$user_id = '';
			$user = 'Anonymous';
		}

		$content_id = $request->input('content_id');
		$comment = $request->input('comment');

		$this->validate($request, [
			'comment' => 'required|max:140',
		]);

		Comment::create([
			'user_id' => $user_id,
			'username' => $user,
			'content_id' => $content_id,
			'comment' => $comment,
		]);

		return redirect()
			->back()
			->with('info', 'Comment successfully added.');


	}
}