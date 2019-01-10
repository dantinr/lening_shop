<?php

namespace App\Http\Controllers\Pay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;

class AlipayController extends Controller
{
    //


    public $app_id = '2016092500593666';
    public $gate_way = 'https://openapi.alipaydev.com/gateway.do';
    public $notify_url = 'http://shop.comcto.com/pay/alipay/notify';
    public $rsaPrivateKeyFilePath = './key/priv.key';

    public function test()
    {

//        $client = new Client([
//            //'base_uri'  => env('APP_URL'),
//            'base_uri'  => $this->gate_way,
//            'timeout'   => 2.0,
//        ]);

        $bizcont = [
            'subject'           => 'ancsd'. mt_rand(1111,9999).str_random(6),
            'out_trade_no'      => 'oid'.date('YmdHis').mt_rand(1111,2222),
            'total_amount'      => 0.01,
            'product_code'      => 'QUICK_WAP_WAY',
            
        ];

        $client = new Client();
        $query = [
            'app_id'   => $this->app_id,
            'method'   => 'alipay.trade.wap.pay',
            //'format'   => 'JSON',
            'charset'   => 'utf-8',
            'sign_type'   => 'RSA2',
            'timestamp'   => date('Y-m-d H:i:s'),
            'version'   => '1.0',
            'notify_url'   => $this->notify_url,
            'biz_content'   => json_encode($bizcont),
        ];

        $sign = $this->rsaSign($query);
        $query['sign'] = $sign;

        //echo '<pre>';print_r($query);echo '</pre>';die;
        //echo '<pre>';print_r($query);echo '</pre>';die;

        //$test_url = env('APP_URL') . '/test/guzzle';
        //$response = $client->request('GET',$test_url,['query'=>$query]);
        $response = $client->request('GET',$this->gate_way,['query'=>$query]);
        //$cont = $response->getHeader('content-type');
        echo '<pre>';print_r(json_decode($response->getBody(),true));echo '</pre>';
        echo $response->getBody();die;

    }


    public function rsaSign($params) {
        return $this->sign($this->getSignContent($params));
    }

    protected function sign($data) {

        $priKey = file_get_contents($this->rsaPrivateKeyFilePath);
        $res = openssl_get_privatekey($priKey);

        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');

        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);

        if(!$this->checkEmpty($this->rsaPrivateKeyFilePath)){
            openssl_free_key($res);
        }
        $sign = base64_encode($sign);
        return $sign;
    }


    public function getSignContent($params) {
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === $this->checkEmpty($v) && "@" != substr($v, 0, 1)) {

                // 转换成目标字符集
                //$v = $this->characet($v, $this->postCharset);
                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }

        unset ($k, $v);
        return $stringToBeSigned;
    }

    protected function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;

        return false;
    }
}
