<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;

class TestController extends Controller
{
    //

    //请求api 获取数据
    public function test1()
    {
        $url = 'http://vm.api.com/test.php?type=2';     //接口地址 获取指定服务
        $client = new Client();
        $response = $client->request('GET',$url);
        $data =  $response->getBody();

        $arr = json_decode($data,true);
        echo '<pre>';print_r($arr);echo '</pre>';

        //TODO



    }

    public function test2()
    {
        $arr = [
            'name'  => 'zhangsan',
            'age'   => 11,
            'email' => 'zhangsan@qq.com'
        ];

        echo json_encode($arr);
    }


    public function encrypt1()
    {

        $timestamp = $_GET['t'];
        $key = 'password';                              // 通信双方提前约定
        $salt = 'xxxxx';
        $method = 'AES-128-CBC';
        $iv = substr(md5($timestamp . $salt),5,16);      // 加密向量


        $sign = base64_decode($_POST['sign']);     //签名
        $base64_data = $_POST['data'];

        //验签
        $pub_res = openssl_get_publickey(file_get_contents("./key/api_pub.key"));
        $rs = openssl_verify($base64_data,$sign,$pub_res,OPENSSL_ALGO_SHA256);

        if(!$rs){
            //TODO 验签失败
        }

        //接收加密数据
        $post_data = base64_decode($_POST['data']);         // decode base64

        //解密
        $dec_str = openssl_decrypt($post_data,$method,$key,OPENSSL_RAW_DATA,$iv);

        if(1){           //解密成功 响应客户端
            $now = time();

            $response = [
                'errno' => 0,
                'msg'   => 'ok',
                'data'  => 'this is secret'
            ];

            $iv2 = substr(md5($now . $salt),5,16);
            //加密响应数据
            $enc_data = openssl_encrypt(json_encode($response),$method,$key,OPENSSL_RAW_DATA,$iv2);

            $arr = [
                't'     => $now,
                'data'  => base64_encode($enc_data)
            ];

            echo json_encode($arr);
        }

    }
}
