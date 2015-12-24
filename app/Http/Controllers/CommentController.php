<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Content;
use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function postComment()
	{
		dd('comment posted');
	}
}