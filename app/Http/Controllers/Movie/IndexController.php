<?php

namespace App\Http\Controllers\Movie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    //


    public function index()
    {

        $key = 'test_bit';

        $seat_status = [];
        for($i=0;$i<=30;$i++){
            //echo $i;echo '</br>';
            $status = Redis::getBit($key,$i);
            //var_dump($status);echo '</br>';echo '<hr>';

            $seat_status[$i] = $status;
        }


        $data = [
            'seat'  => $seat_status
        ];
        //echo '<pre>';print_r($seat_status);echo '</pre>';
        return view('movie.index',$data);
    }


    public function buy($pos,$status)
    {
        $key = 'test_bit';

        Redis::setbit($key,$pos,$status);

    }
}
