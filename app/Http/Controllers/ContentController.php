<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class ContentController extends Controller
{
	public function getAddContent()
	{
		return view('content.add');
	}
}