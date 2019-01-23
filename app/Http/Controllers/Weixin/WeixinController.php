<?php

namespace App\Http\Controllers\Weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeixinController extends Controller
{
    //


    /**
     * 微信接入认证
     */
    public function validToken()
    {
        $get = json_encode($_GET);
        $str = '>>>>>' . date('Y-m-d H:i:s') .' '. $get . "<<<<<\n";
        file_put_contents('logs/weixin.log',$str,FILE_APPEND);
    }
}
