<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware(function($request,$next){
            //验证是否有登录token
            if(!session()->exists('token')){
                header('Refresh:2;url=/user/login');
                echo '请先登录';
                exit();
            }
            return $next($request);
        });
    }

    //
    public function index(Request $request)
    {

    }
}
