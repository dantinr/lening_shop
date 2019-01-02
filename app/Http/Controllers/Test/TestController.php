<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //

	public function world1()
	{
		echo __METHOD__;
	}


	public function hello2()
	{
		echo __METHOD__;
		header('Location:/world2');
	}

	public function world2()
	{
		echo __METHOD__;
	}
}
