<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
	public function getAddContent()
	{
		return view('content.add');
	}

	public function postAddContent(Request $request)
	{
		$getUrl = $request->input('url');
		$userid = Auth::user()->id;

		$this->validate($request, [
			'url' => 'required|url',
		]);

		Content::create([
			'url' => $request->input('url'),
			'user_id' => $userid,
			'type' => 'test',
		]);

		return redirect()
			->route('home')
			->with('info', 'Content successfully added.');
	}

	public function showContent()
	{
		$contents = DB::table('contents')
			->orderBy('created_at', 'desc')
			->get();

		return view('home')->with('contents', $contents);
	}
}