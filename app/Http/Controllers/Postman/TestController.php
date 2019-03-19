<?php

namespace App\Http\Controllers\Postman;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //

    public function test1()
    {

        echo '<pre>';print_r($_SERVER);echo '</pre>';
       //echo '<pre>';print_r($_POST);echo '</pre>';

//        //$data_str = file_get_contents("php://input");
//        $file = file_get_contents("php://input");
//
//        $rs = file_put_contents("abc.jpg",$file);
//var_dump($rs);
        //echo '<pre>';print_r($_FILES);echo '</pre>';
        //echo $data_str;
    }

    public function test2()
    {
        echo '<pre>';print_r($_SERVER);echo '</pre>';
    }


    public function test3()
    {
        $arr = [
            'name'  => 'zhangsan',
            'age'   => 11,
            'email' => 'zhangsan@qq.com'
        ];

        echo json_encode($arr);
    }
}
