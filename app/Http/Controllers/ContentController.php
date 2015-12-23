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
		$userid = Auth::user()->id;
		$getUrl = $request->input('url');
		$ytkey = 'AIzaSyC0CWrn91w9KsIHs3_GIleFxZ3eYTz_IxI';

		/**
		 * Getting the domain
		 */

		$getUrl = trim($getUrl, '/');
		if (!preg_match('#^http(s)?://#', $getUrl)) {
    		$getUrl = 'http://' . $getUrl;
		}

		$urlParts = parse_url($getUrl);
		$type = preg_replace('/^www\./', '', $urlParts['host']);

		/**
		 * Parse url
		 */

		if ($type == "youtube.com")
		{
			if(preg_match("/youtu.be\/[a-z1-9.-_]+/", $getUrl)) {

	    		preg_match("/youtu.be\/([a-z1-9.-_]+)/", $getUrl, $matches);

	    		if(isset($matches[1])) {
	        		$getUrl = 'http://www.youtube.com/embed/'.$matches[1];
	    		}
			}
			else if(preg_match("/youtube.com(.+)v=([^&]+)/", $getUrl)) {
	    	
	    		preg_match("/v=([^&]+)/", $getUrl, $matches);
	    
	    		if(isset($matches[1])) {
	        		$getUrl = 'http://www.youtube.com/embed/'.$matches[1];
	    		}
			}
			$video_id = $matches[1];
			$data = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=" . $video_id . "&key=" . $ytkey . "&part=snippet,contentDetails,statistics,status");
			$result = json_decode($data, true);
			$video_title = $result['items'][0]['snippet']['title'];
		}
		else if ($type == "vimeo.com")
		{
			dd('vimeo');
		}
		else
		{
			dd('something else');
		}

		/**
		 * Validation
		 */

		$this->validate($request, [
			'url' => 'required|url',
		]);

		Content::create([
			'url' => $getUrl,
			'user_id' => $userid,
			'type' => $type,
			'content_id' => $video_id,
			'content_title' => $video_title,
		]);

		return redirect()
			->route('home')
			->with('info', 'Content successfully added.');
	}

	public function showContent()
	{
		$contents = Content::all();

		return view('home')->with('contents', $contents);
	}
}