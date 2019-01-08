<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function __construct()
    {

    }

    //
    public function index(Request $request)
    {
        echo __METHOD__;
    }


    /**
     * 添加商品
     */
    public function add()
    {

    }

    /**
     * 删除商品
     */
    public function del()
    {

    }




}
