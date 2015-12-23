<?php

namespace App\Http\Controllers;

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
}