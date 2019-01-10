<?php

namespace App\Http\Controllers\Pay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;

class AlipayController extends Controller
{
    //

    public function test()
    {
        //echo __METHOD__;die;
        $client = new Client([
            'base_uri'  => 'http://shop.lening.com',
            //'base_uri'  => 'http://127.0.0.1',
            'debug' => true,
//            'headers'   => [
//                'Host'  => 'shop.lening.com'
//            ],
            'timeout'   => 2.0,
        ]);


        $response = $client->request('GET','/test/guzzle');
        var_dump($response);die;
        echo $response->getBody();

    }
}
