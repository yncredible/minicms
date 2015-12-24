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
		 * Parse urls
		 */

		/**
		 * YOUTUBE
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
			// using the YouTube API
			$video_id = $matches[1];
			$data = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=" . $video_id . "&key=" . $ytkey . "&part=snippet,contentDetails,statistics,status");
			$result = json_decode($data, true);
			$video_title = $result['items'][0]['snippet']['title'];
		}

		/**
		 * VIMEO
		 */

		else if ($type == "vimeo.com")
		{
			if(preg_match("/vimeo.com\/[1-9.-_]+/", $getUrl)) {
    			
    			preg_match("/vimeo.com\/([1-9.-_]+)/", $getUrl, $matches);
    		
    			if(isset($matches[1])) {

        			$getUrl = 'http://player.vimeo.com/video/'.$matches[1];
    			}
			}
			// using the Vimeo API
			$oembed_endpoint = 'http://vimeo.com/api/oembed';
			$video_url = $request->input('url');
			$xml_url = $oembed_endpoint . '.xml?url=' . rawurlencode($video_url) . '&width=640';
			// Curl helper function
			function curl_get($url) {
			    $curl = curl_init($url);
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
			    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			    $return = curl_exec($curl);
			    curl_close($curl);
			    return $return;
			}
			$oembed = simplexml_load_string(curl_get($xml_url));
			$video_id = $matches[1];
			$video_title = $oembed->title;
		}

		/**
		 * SOUNDCLOUD
		 */

		else if ($type == "soundcloud.com")
		{
			$video_id = '';
			$video_title = 'SoundCloud';
		}
		else
		{
			include_once('../public/templates/simple_html_dom.php');
			$html = file_get_html($getUrl);
			$element = $html->find('img');

			$getUrl = $element[0]->src;
			$video_id = '';
			$video_title = $type;
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
		$contents = Content::orderBy('created_at', 'desc')->get();

		return view('home')->with('contents', $contents);
	}

	public function showDetail($id)
	{
		$contents = Content::where('id', $id)->get();
		return view('content.show')->with('contents', $contents);
	}
}